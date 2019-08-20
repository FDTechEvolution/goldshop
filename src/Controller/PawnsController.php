<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\I18n\Number;

/**
 * Pawns Controller
 *
 * @property \App\Model\Table\PawnsTable $Pawns
 *
 * @method \App\Model\Entity\Pawn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PawnsController extends AppController {

    public $PWCode = 'PW';
    public $Branches = null;
    public $Orgs = null;
    public $Users = null;
    public $Products = null;
    public $PawnLines = null;
    public $Bpartners = null;
    public $Addresses = null;
    public $Warehouses = null;
    public $WhProducts = null;
    public $PawnTransactions = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->loadComponent('GoldPrice');
        $this->loadComponent('DocSequent');
        $this->loadComponent('Gold');
        //$this->loadComponent('Bpartner');
        //$this->loadComponent('InvoiceProcess');
        $this->loadComponent('MakePayment');
        $this->loadComponent('WarehouseProcess');
        $this->loadComponent('Product');
        $this->loadComponent('GoodsTransaction');
        $this->Branches = TableRegistry::get('Branches');
        $this->Users = TableRegistry::get('Users');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->Products = TableRegistry::get('Products');
        $this->PawnLines = TableRegistry::get('PawnLines');
        $this->Bpartners = TableRegistry::get('Bpartners');
        $this->Addresses = TableRegistry::get('Addresses');
        $this->Warehouses = TableRegistry::get('Warehouses');
        $this->WhProducts = TableRegistry::get('WhProducts');
        $this->PawnTransactions = TableRegistry::get('PawnTransactions');

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function getinterrestrate() {
        $this->viewBuilder()->layout('ajax');
        $json = '';
        if ($this->request->is('ajax')) {
            $date = $this->request->data('diffDays');
            $type = $this->request->data('type');
            $json = $this->Pawn->calinterestrate($type, $date);
        }
        $this->set('json', $json);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $pawn = $this->Pawns->newEntity();

        if ($this->request->is('post')) {

            $data = $this->request->getData();
            //$this->log($data, 'debug');

            $q = $this->Pawns->find()->where(['docno' => $data['docno']]);
            $_dn = $q->first();


            if (is_null($_dn) || $_dn == '') {
                $pawn = $this->Pawns->patchEntity($pawn, $data);
                $pawn->bpartner_id = $data['bpartner_id'];
                $pawn->branch_id = $this->Core->getLocalBranchId();
                $pawn->warehouse_id = $data['warehouse'];
                $pawn->org_id = $this->Core->getLocalOrgId();
                $pawn->cratedby = $this->Authen->getAuthenUserId();
                $pawn->docdate = $this->Util->convertDate($data['date']);
                $pawn->expiredate = $this->Util->convertDate($data['expiredate']);
                $pawn->status = 'CO';

                $time = Time::now();
                $strLog = sprintf('<strong>#%s ทำรายการใหม่#</strong><br/>', $time->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE));
                $strLog = $strLog . sprintf('- ระยะเวลา %s - %s เงินต้น %s บาท<br/>', $data['date'], $data['expiredate'], Number::format($data['totalmoney']));
                /*
                  $text = 'วันที่ ' . $data['date'] . ' : ทำรายการใหม่ <br>' .
                  'วันที่ ' . $data['expiredate'] . ' : สิ้นอายุ <br>' .
                  ' เงินต้น  ' . $data['totalmoney'] . '<br><hr>';
                 * 
                 */
                $pawn->log_history = $strLog;

                if ($this->Pawns->save($pawn)) {
                    ////////pawn transaction
                    $pawntransaction = $this->PawnTransactions->newEntity();
                    $pawntransaction->pawn_id = $pawn->id;
                    $pawntransaction->transaction_date = $pawn->created;
                    $pawntransaction->type = 'NEW';
                    $pawntransaction->amount = $data['totalmoney'];
                    $pawntransaction->seller = $data['seller'];
                    $pawntransaction->createdby = $this->Authen->getAuthenUserId();
                    $this->PawnTransactions->save($pawntransaction);
                    ///////////payment
                    $this->makepayment($data['bank_account_id'], $data['date'], $data['payment_method'], $this->Core->getLocalOrgId(), $this->Core->getLocalBranchId(), $pawn->bpartner_id, $pawn->id, $data['totalmoney'], 'N', 'PAWN', $data['seller']);

                    ///////////////////pawnline
                    $index = 0;
                    $isOverPrice = 'N';

                    foreach ($data['price'] as $line) {

                        if ($data['design_id'] == '' || is_null($data['design_id'])) {
                            $design = null;
                        } else {
                            $design = $data['design_id'][$index];
                        }
                        $product = $this->verifyProduct($data['detail'][$index], $data['product_category_id'][$index], $data['percent'][$index], $design, $data['weight'][$index], 0);

                        $price = $data['price'][$index];
                        $expectPrice = $data['expect_price'][$index];
                        $priceDif = $expectPrice * 0.03;
                        if ($price > ($priceDif + $expectPrice)) {
                            $isOverPrice = 'Y';
                        }

                        $pawnLine = $this->PawnLines->newEntity();
                        $pawnLine['pawn_id'] = $pawn->id;
                        $pawnLine['seq'] = $index + 1;
                        $pawnLine['product_id'] = $product->id;
                        //$pawnLine['description'] = $data['des'][$index];
                        $pawnLine['amount'] = $price;
                        $pawnLine['weight'] = $data['weight'][$index];
                        $pawnLine['creatbyed'] = $this->Authen->getAuthenUserId();

                        $img_id = $this->UploadImage->uploadpawnimage($data['img'][$index]);
                        $pawnLine['image_id'] = $img_id['image_id'];
                        if (!$this->PawnLines->save($pawnLine)) {
                            $this->log($pawnLine->errors(), 'debug');
                        }
                        /////////

                        $qwh = $this->WhProducts->find()
                                ->where(['WhProducts.warehouse_id' => $data['warehouse'], 'WhProducts.product_id' => $product->id]);
                        $whProduct = $qwh->first();
                        if (is_null($whProduct)) {
                            $whProduct = $this->WhProducts->newEntity();
                            $whProduct->product_id = $product->id;
                            $whProduct->balance_amt = 1;
                            $whProduct->warehouse_id = $data['warehouse'];
                            $whProduct->createdby = $this->Authen->getAuthenUserId();
                        } else {

                            $whProduct->balance_amt += 1;
                            $whProduct->modifiedby = $this->Authen->getAuthenUserId();
                        }
                        $result = $this->WhProducts->save($whProduct);
                        if (!$result) {
                            $this->log($whProduct->errors(), 'debug');
                        }
                        $index++;
                    }

                    if ($isOverPrice == 'Y') {
                        $pawn->isoverprice = $isOverPrice;
                        $this->Pawns->save($pawn);
                    }

                    $this->Flash->success(__('The pawn has been saved.'));

                    return $this->redirect(['controller' => 'pos', 'action' => 'index']);
                } else {
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('เลขเอกสารซ้ำ ไม่สามารถบันทึกได้'));
            }
        }

        $warehouseList = $this->Core->getWarehouseList(['ispawn' => 'Y']);

        $percents = $this->Gold->getGoldPercent();

        $this->set(compact('warehouseList', 'pawn', 'percents'));
    }

    /**
     * View method
     *
     * @param string|null $id Pawn id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $pawn = $this->Pawns->get($id, [
            'contain' => ['Orgs', 'Branches' => ['Addresses'], 'Bpartners', 'BankAccounts', 'PawnLines' => ['Products']]
        ]);
        $docStatusList = $this->TransactionCode->getStatusCode();
        //$this->log($pawn,'debug');
        $this->set(compact('docStatusList', 'pawn'));
    }

  
    public function void($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $pawn = $this->Pawns->get($id, ['contain' => ['PaymentLines']]);
        $pawn->status = 'VO';
        $pawn->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->Pawns->save($pawn)) {
            if (sizeof($pawn->payment_lines) > 0) {
                $paymentLine = $pawn['payment_lines'][0];
                $this->MakePayment->void($paymentLine['payment_id']);
            }

            $this->Flash->success(__('ยกเลิกรายการรับจำนำนี้แล้ว'));
        } else {
            $this->Flash->error(__('The pawn could not be cancle. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $id]);
    }
    
    public function expire($id = null){
        $todayDate = new Date();
        $todayDate = $todayDate->i18nFormat('yyyy-MM-dd');
        $warehouseList = $this->Core->getWarehouseList(['ispurchase' => 'Y'], false, 'all');
        $pawn = $this->Pawns->get($id,['contain'=>['PawnLines']]);
        $pawn->status = 'EXPIRE';
        $pawn->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->Pawns->save($pawn)) {
            $this->Flash->success(__('รายการนี้หลุดจำนำแล้ว'));
            //getSaveDraft($docdate, $type, $from_warehouse = null, $to_warehouse = null, $seller = null)
            $goodsTran = $this->GoodsTransaction->getSaveDraft($todayDate,'PX',$pawn->warehouse_id,$warehouseList[0]['id'],null);
            foreach ($pawn->pawn_lines as $index => $line){
                //createLine($goods_transaction_id, $product_id, $qty = 0, $description = null, $seq = 0)
                $this->GoodsTransaction->createLine($goodsTran->id,$line->product_id,1,$line->description,$index);
            }
            $this->GoodsTransaction->complete($goodsTran->id);
            $this->Flash->success(__('ย้ายไปยังคลังทองเก่าแล้ว'));
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    public function listpawn() {
        $todayDate = new Date();
        $type = $this->request->getQuery('type');
        $branchId = $this->Core->getLocalBranchId();

        $pawns = [];
        $title = 'รายการจำนำประจำวันที่ ' . $todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE);
        $weightAmt = 0;
        $totalAmt = 0;

        if (is_null($type)) {
            $q = $this->Pawns->find('all', [
                'conditions' => ['Pawns.branch_id ' => $branchId, 'Pawns.docdate' => $todayDate],
                'contain' => ['Bpartners', 'PawnLines'],
                'order' => ['Pawns.docdate' => 'DESC']
            ]);
            $pawns = $q->toArray();

            foreach ($pawns as $data) {
                $totalAmt += $data->totalmoney;
                foreach ($data->pawn_lines as $item) {
                    $weightAmt += $item->weight;
                }
            }
        } else if (strtolower($type) == 'all') {
            $title = 'รายการจำนำทั้งหมด';
            $q = $this->Pawns->find()
                    ->contain(['Bpartners', 'PawnLines'])
                    ->order(['Pawns.docdate' => 'DESC']);
            $pawns = $q->toArray();
        }else if(strtolower($type)=='expire'){
             $title = 'รายการหลุดจำนำทั้งหมด';
             $q = $this->Pawns->find()
                    ->contain(['Bpartners', 'PawnLines'])
                     ->where(['Pawns.expiredate <'=>$todayDate])
                    ->order(['Pawns.docdate' => 'DESC']);
            $pawns = $q->toArray();
        }

        $docStatusList = $this->TransactionCode->getStatusCode();
        $this->set(compact('pawns', 'docStatusList', 'todayDate', 'totalAmt', 'weightAmt', 'title','type'));
    }

    public function returnpawn($id = null) {
        $pawn = $this->Pawns->get($id, [
            'contain' => ['Warehouses', 'Bpartners' => ['Orgs', 'Addresses'], 'PawnLines' => ['Products', 'Images'], 'Branches' => ['Orgs', 'Addresses']]
        ]);

        $org = $this->Core->getLocalOrgId();
        $branch = $this->Core->getLocalBranchId();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //$this->log($data, 'debug');
            //die();
            $wording = '';

            if ($data['func'] == 'return') {
                $pawn->returndate = $this->Util->convertDate($data['returndate']);
                $pawn->type = $data['type'];
                $pawn->interrestrate = $data['interrestrate'] - $data['discountamt'];
                $pawn->modifiedby = $this->Authen->getAuthenUserId();
                //$pawn->rate = $data['newrate'];
                $pawn->status = 'RF';
                $text = '<br>วันที่ ' . $data['returndate'] . ' : ไถ่ถอน <br>' .
                        ' เงินต้น  ' . $data['totalmoney'] . ' ดอกเบี้ย ' . $data['type'] . '<br>'
                        . ' ค่าดอกเบี้ย ' . $data['interrestrate'] . ' บาท ' . ' ส่วนลดค่าดอกเบี้ย ' . $data['discountamt'] . ' บาท ' . '<br>'
                        . ' รวมเป็นเงิน ' . $data['totalamt'] . ' บาท ' . '<br><hr>';

                $amt = $data['totalamt'];
                $pawn->log_history = $text . $pawn->log_history;
                //'ไถ่ถอนวันที่ -' . $data['returndate'] . '- เงินต้น - ' . $data['newtotalmoney'] . ' ' . $wording . $data['money'] . 'บาท  -ดอกเบี้ย-' . $data['newrate'] . '%' . '-ค่าดอกเบี้ย-' . $data['newinterrestrate'] . ' บาท ' . 'ส่วนลดค่าดอกเบี้ย ' . $data['discount'] . ' บาท <br>';

                $pawn->modifiedby = $this->Authen->getAuthenUserId();

                $returnproduct = $pawn->pawn_lines;

                foreach ($returnproduct as $dataproduct) {
                    $qwhproduct = $this->WhProducts->find()
                            ->where(['WhProducts.product_id ' => $dataproduct['product_id']]);
                    $qwhproduct = $qwhproduct->first();

                    $qwhproduct->balance_amt -= 1;
                    $qwhproduct->modifiedby = $this->Authen->getAuthenUserId();


                    $this->WhProducts->save($qwhproduct);
                }

                if ($this->Pawns->save($pawn)) {
                    ////////pawn transaction
                    $pawntransaction = $this->PawnTransactions->newEntity();
                    $pawntransaction->pawn_id = $pawn->id;
                    $pawntransaction->transaction_date = $pawn->modified;
                    $pawntransaction->type = 'RF';
                    $pawntransaction->amount = $data['totalamt'];
                    $pawntransaction->seller = $data['seller'];
                    $pawntransaction->createdby = $this->Authen->getAuthenUserId();
                    $this->PawnTransactions->save($pawntransaction);
                    $this->Flash->success(__('The pawn has been saved.'));

                    $this->makepayment($data['bank_account_id'], $data['thisdate'], $data['payment_method'], $org, $branch, $pawn->bpartner_id, $pawn->id, $amt, 'Y', 'PAWN_RETURN', $data['seller']);


                    return $this->redirect(['controller' => 'pos', 'action' => 'index']);
                } else {
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            } else {
                $time = Time::now();

                $strLog = sprintf('<strong>#%s ต่อดอก#</strong><br/>', $time->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE));
                $strLog = $strLog . sprintf('- กำหนดเดิม %s - %s<br/>', $pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE), $pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE));
                $strLog = $strLog . sprintf('- จ่ายดอกเบี้ยของ %s - %s ดอกเบี้ย %s จำนวน %s บาท ส่วนลด %s บาท รับเงินจริง %s บาท<br/>', $pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE), $data['returndate'], $data['type'], $data['interrestrate'], $data['discountamt'], $data['receiptamt']);

                /*
                  $text = 'วันที่ ' . $data['thisdate'] . ' : ต่อดอก <br>' .
                  'วันที่ ' . $data['newexpdate'] . ' : สิ้นอายุ <br>' .
                  ' ดอกเบี้ย ' . $data['type'] . '<br>' .
                  ' ค่าดอกเบี้ย ' . $data['interrestrate'] . ' บาท ' . ' ส่วนลดค่าดอกเบี้ย ' . $data['discountamt'] . ' บาท ' . '<br>'
                  . 'จ่าย ค่าดอกเบี้ยสุทธิ ' . $data['totalamt'] . ' บาท ของวันที่ ' . $pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE) . ' - ' . $data['returndate'] . '<br><hr>';
                 */

                $amt = $data['totalamt'];
                $pawn->interrestrate = $data['totalamt'];
                $pawn->modifiedby = $this->Authen->getAuthenUserId();
                $pawn->totalmoney = $data['totalmoney'];
                $pawn->docdate = $this->Util->convertDate($data['returndate']);
                $pawn->expiredate = $this->Util->convertDate($data['newexpdate']);
                $pawn->type = $data['type'];

                $pawn->log_history = $strLog . $pawn->log_history;
                //'ต่อดอกวันที่ -' . $data['date'] . '-สิ้นอายุวันที่ -' . $data['returndate'] . ' - เงินต้น - ' . $data['newtotalmoney'] . ' ' . $wording . $data['money'] . 'บาท  -ดอกเบี้ย-' . $data['newrate'] . '%' . '-ค่าดอกเบี้ย-' . $data['newinterrestrate'] . ' บาท ' . 'ส่วนลดค่าดอกเบี้ย ' . $data['discount'] . ' บาท <br>';

                if ($this->Pawns->save($pawn)) {
                    ////////pawn transaction
                    $pawntransaction = $this->PawnTransactions->newEntity();
                    $pawntransaction->pawn_id = $pawn->id;
                    $pawntransaction->transaction_date = $pawn->modified;
                    $pawntransaction->type = 'RN';
                    $pawntransaction->amount = $data['totalamt'];
                    $pawntransaction->seller = $data['seller'];
                    $pawntransaction->createdby = $this->Authen->getAuthenUserId();
                    $this->PawnTransactions->save($pawntransaction);
                    $this->Flash->success(__('The pawn has been saved.'));
                    $this->makepayment($data['bank_account_id'], $data['thisdate'], $data['payment_method'], $org, $branch, $pawn->bpartner_id, $pawn->id, $amt, 'Y', 'PAWN_INTEREST', $data['seller']);

                    return $this->redirect(['controller' => 'pos', 'action' => 'index']);
                } else {
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            }
        }

        $this->set(compact( 'pawn'));
    }

    private function verifyProduct($name = null, $product_category_id = null, $percent = null, $design_id = null, $weight_id = null, $price = 0) {
        $q = $this->Products->find()
                ->where(['name' => $name]);
        $product = $q->first();

        if (is_null($product) || $product == '') {
            //$this->log('new pro', 'debug');
            $product = $this->Products->newEntity();
            $product->name = $name;
            //$product->code = $this->Product->generateProductCode($product_category_id);
            $product->code = '_temp';
            $product->standard_price = 0;
            $product->actual_price = $price;
            $product->isactive = 'Y';

            $product->product_category_id = $product_category_id;
            $product->createdby = $this->Authen->getAuthenUserId();
            $product->org_id = $this->Core->getLocalOrgId();
            $product->design_id = $design_id;
            $product->percent = $percent;

            $result = $this->Products->save($product);
            if (!$result) {
                $this->log($product->errors(), 'debug');
            }
            return $product;
        } else {

            return $product;
        }
    }

    private function makepayment($bankAccountId = null, $docdate = null, $payment_method = null, $org_id = null, $branch_id = null, $bp_id = null, $pawn_id = null, $amt = null, $isreceipt = 'N', $paymentType = null, $seller = null) {
        //Payment
        //getSaveDraft($paymentDate = null,$paymentMethod = null, $bankAccountId = null, $bpartnerId = null, $isReceipt = 'Y',$warehouseId = null, $type = null,$seller= null)
        $payment = $this->MakePayment->getSaveDraft($docdate, $payment_method, $bankAccountId, $bp_id, $isreceipt, null, $paymentType, $seller);
        //Payment Line
        //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
        $this->MakePayment->getSavePaymentLine($payment->id, 1, null, null, $pawn_id, null, null, $amt, 1);
        //completedPayment($payment = null,$documentCode = null,$amount =0,$discount = 0,$usesavingamt = 0,$totalAmount = 0)
        $this->MakePayment->completedPayment($payment, ($isreceipt == 'Y' ? 'AR' : 'AP'), $amt, 0, 0, $amt);
    }

    public function listreturnpawn() {
        $todayDate = new Date();

        $datest = new Time();
        $dateed = new Time();
        $datest->setTime(0, 0, 0);
        $dateed->setTime(24, 0, 0);
        $branch = $this->Core->getLocalBranchId();


        $q = $this->PawnTransactions->find('all', [
            'conditions' => ['Pawns.branch_id ' => $branch, 'PawnTransactions.created >' => $datest, 'PawnTransactions.created <' => $dateed, 'PawnTransactions.type !=' => 'NEW'],
            'contain' => ['Pawns' => 'Bpartners'],
            'order' => ['PawnTransactions.created' => 'DESC']
        ]);
        $pawns = $q->toArray();
        //$this->log($pawns,'debug');
        $sumRN = 0;
        $countRN = 0;
        $countRF = 0;
        $sumRF = 0;

        //$this->log($pawns, 'debug');
        foreach ($pawns as $data) {
            if ($data->type == 'RF') {
                $countRF++;
                $sumRF += $data->amount;
            } else {
                $countRN++;
                $sumRN += $data->amount;
            }
        }

        $docStatusList = $this->TransactionCode->getStatusCode();
        $this->set(compact('pawns', 'docStatusList', 'todayDate', 'countRN', 'sumRN', 'sumRF', 'countRF'));
        $this->set('_serialize', ['pawns']);
    }

    public function ajaxsearch() {
        $this->autoRender = false;
        $branch = $this->Core->getLocalBranchId();
        $where = '';
        if ($branch != '0') {
            $where = $branch;
        }
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $text = $data['search_text'];

            $q = $this->Pawns->find()
                    ->contain(['Bpartners'])
                    ->where(['OR' => [
                    ['Pawns.docno LIKE' => '%' . $text . '%'],
                    ['Bpartners.name LIKE' => '%' . $text . '%'],
                    ['Bpartners.taxid LIKE' => '%' . $text . '%']
                ], ['Pawns.branch_id ' => $where, 'Pawns.status' => 'CO']]);
//            $this->log($where, 'debug');
            $pawns = $q->toArray();

            echo json_encode($pawns);
            die();
            //$this->log($bpartners, 'debug');
        }
    }

}
