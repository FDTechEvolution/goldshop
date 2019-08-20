<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

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
    public $Provinces = null;
    public $Warehouses = null;
    public $WhProducts = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->loadComponent('GoldPrice');
        $this->loadComponent('DocSequent');
        $this->loadComponent('Gold');
        $this->loadComponent('Bpartner');
        $this->loadComponent('InvoiceProcess');
        $this->loadComponent('PaymentProcess');
        $this->loadComponent('WarehouseProcess');
        $this->loadComponent('Product');
        $this->Branches = TableRegistry::get('Branches');
        $this->Users = TableRegistry::get('Users');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->Products = TableRegistry::get('Products');
        $this->PawnLines = TableRegistry::get('PawnLines');
        $this->Bpartners = TableRegistry::get('Bpartners');
        $this->Addresses = TableRegistry::get('Addresses');
        $this->Provinces = TableRegistry::get('Provinces');
        $this->Warehouses = TableRegistry::get('Warehouses');
        $this->WhProducts = TableRegistry::get('WhProducts');

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function getinterrestrate() {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $date = $this->request->data('diffDays');
            $type = $this->request->data('type');
            echo $this->Pawn->calinterestrate($type, $date);
        }
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
            
            $pawn = $this->Pawns->patchEntity($pawn, $data);
            if(strtolower($data['customer_type']) == 'normal'){
                $bpartner = $this->Bpartner->getGuestCustomer();
                $pawn->bpartner_id = $bpartner->id;
            }else{
                $pawn->bpartner_id = $data['bpartner_id'];
            }
            
            

            //$pawn->docno = $this->DocSequent->getLatestAndSave($this->PWCode);
            $pawn->branch_id = $this->Core->getLocalBranchId();

            $pawn->warehouse_id = $data['warehouse'];
            $pawn->org_id = $this->Core->getLocalOrgId();
            $pawn->cratedby = $data['seller'];
            $pawn->docdate = $this->Util->convertDate($data['date']);
            $pawn->expiredate = $this->Util->convertDate($data['expiredate']);

            $pawn->status = 'CO';
//   
            //'ทำรายการใหม่ - ' . $data['date'] . '- สิ้นอายุ -' . $data['expiredate'] .'- เงินต้น - '.$data['totalmoney']. '-ดอกเบี้ย-' . $data['rate'] . '%' . '-ค่าดอกเบี้ย-' . $data['interrestrate'] . ' บาท' . '<br>';

            $text = 'วันที่ ' . $data['date'] . ' : ทำรายการใหม่ <br>' .
                    'วันที่ ' . $data['expiredate'] . ' : สิ้นอายุ <br>' .
                    ' เงินต้น  ' . $data['totalmoney'] . '<br><hr>';
            $pawn->log_history = $text;

            if ($this->Pawns->save($pawn)) {
                ///////////////////pawnline
                $index = 0;

                foreach ($data['qty'] as $line) {

                    if ($data['design_id'] == '' || is_null($data['design_id'])) {
                        $design = null;
                    } else {
                        $design = $data['design_id'][$index];
                    }
                    $product = $this->verifyProduct($data['detail'][$index], $data['typeid'][$index], $data['product_category_id'][$index], $data['percent'][$index], $design, $data['weight'][$index], 0);
//

                    $pawnLine = $this->PawnLines->newEntity();
                    $pawnLine['pawn_id'] = $pawn->id;
                    $pawnLine['seq'] = $index + 1;
                    $pawnLine['product_id'] = $product->id;
                    $pawnLine['description'] = $data['des'][$index];
                    $pawnLine['amount'] = $data['qty'][$index];
                    $pawnLine['creatbyed'] = $this->Authen->getAuthenUserId();
                    $this->PawnLines->save($pawnLine);
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

                $this->Flash->success(__('The pawn has been saved.'));

                return $this->redirect(['controller' => 'pos', 'action' => 'index']);
            } else {
                $this->log($pawn->errors(), 'debug');
            }
            $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
        }

        $warehouseList = $this->Core->getWarehouseList(['ispawn' => 'Y']);
        $sellerList = $this->Core->getSellerList();
        $goldPrices = $this->GoldPrice->getPrice();
        $bankAccountList = $this->Core->getBankAccountList('BACC');
        $productType = $this->TransactionCode->getProductType('list');
        $productCats = $this->Product->getProductCategoryList();
        $designs = $this->Products->Designs->find('list', ['group' => 'name', 'order' => 'name ASC']);
        $percents = $this->Gold->getGoldPercent();

        $this->set(compact('warehouseList', 'goldPrices', 'pawn', 'bankAccountList', 'sellerList', 'productType', 'productCats', 'designs', 'percents'));
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
            'contain' => ['Orgs', 'Branches', 'Bpartners', 'BankAccounts', 'PawnLines']
        ]);

        $this->set('pawn', $pawn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $pawn = $this->Pawns->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $pawn = $this->Pawns->patchEntity($pawn, $data);

            $queryBranch = $this->Branches->get($data['branch_id'], [
                'contain' => []
            ]);
            $branch = $queryBranch->toArray();
            $pawn->org_id = $branch['org_id'];
            $pawn->cratedby = $this->Authen->getAuthenUserId();




            if ($this->Pawns->save($pawn)) {
                ///////////////////pawnline
                $pawnLine['pawn_id'] = $pawn->id;
                $pawnLine['seq'] = 1;
                $pawnLine['product_id'] = $data['product_id'];
                $pawnLine['description'] = data['description2'];
                $pawnLine['amount'] = data['amount'];
                $pawnLine->creatbyed = $this->Authen->getAuthenUserId();

                if ($this->PawnLines->save($pawnLine)) {
                    $this->Flash->success(__('The pawn has been saved.'));

                    return $this->redirect(['action' => 'listpawn']);
                }
            }
            $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
        }
        $orgs = $this->Pawns->Orgs->find('list', ['limit' => 200]);
        $branches = $this->Pawns->Branches->find('list', ['limit' => 200]);
        $bpartners = $this->Pawns->Bpartners->find('list', ['limit' => 200]);
        $bankAccounts = $this->Pawns->BankAccounts->find('list', ['limit' => 200]);
        $this->set(compact('pawn', 'orgs', 'branches', 'bpartners', 'bankAccounts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pawn id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $pawn = $this->Pawns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pawn = $this->Pawns->patchEntity($pawn, $this->request->getData());
            if ($this->Pawns->save($pawn)) {
                $this->Flash->success(__('The pawn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
        }
        $orgs = $this->Pawns->Orgs->find('list', ['limit' => 200]);
        $branches = $this->Pawns->Branches->find('list', ['limit' => 200]);
        $bpartners = $this->Pawns->Bpartners->find('list', ['limit' => 200]);
        $bankAccounts = $this->Pawns->BankAccounts->find('list', ['limit' => 200]);
        $this->set(compact('pawn', 'orgs', 'branches', 'bpartners', 'bankAccounts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pawn id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pawn = $this->Pawns->get($id);
        $pawn->status = 'VO';
        $pawn->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->Pawns->save($pawn)) {
            $this->Flash->success(__('The pawn has been cancled.'));
        } else {
            $this->Flash->error(__('The pawn could not be cancle. Please, try again.'));
        }

        return $this->redirect(['action' => 'listpawn']);
    }

    public function listpawn() {
//        $date = new Date();
//
//        $datestr = $date->format('Y') . '-' . $date->format('m') . '-1';
//        $dateend = $date->format('Y') . '-' . $date->format('m') . '-31';



        $branch = $this->Core->getLocalBranchId();
        $where = '';
        if ($branch != '0') {
            $where = $branch;
        }
        $pawns = $this->Pawns->find('all', [
            'conditions' => ['Pawns.branch_id ' => $where],
            'contain' => ['Bpartners'],
            'order' => ['docno' => 'DESC']
        ]);
        if ($this->request->is(['post'])) {

            $code = $this->request->data('txtsearch');

            if ($code != '') {

                $code = '%' . $this->request->data('txtsearch') . '%';


                $pawns = $this->Pawns->find('all', [
                    'conditions' => ['docno LIKE ' => $code, 'returndate is' => NULL, 'Pawns.branch_id' => $where],
                    'contain' => ['Bpartners'],
                    'order' => ['docno' => 'DESC']
                ]);
            }
        }
        $docStatusList = $this->TransactionCode->getStatusCode();
        $this->set(compact('pawns', 'docStatusList'));
        $this->set('_serialize', ['pawns']);
    }

    public function returnpawn($id = null) {
        $pawn = $this->Pawns->get($id, [
            'contain' => ['Warehouses','Bpartners' => ['Orgs', 'Addresses' => ['Provinces']], 'PawnLines' => ['Products'], 'Branches' => ['Orgs', 'Addresses' => ['Provinces']]]
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();


            $wording = '';
//            if ($data['editamount'] == 'addmoney') {
//                $wording = 'เพิ่มเงินต้น ';
//            } else if ($data['editamount'] == 'dismoney') {
//                $wording = 'ลดเงินต้น ';
//            }
            if ($data['func'] == 'return') {
                $pawn->returndate = $this->Util->convertDate($data['returndate']);
                $pawn->rate = $data['newrate'];
                $pawn->interrestrate = $data['newinterrestrate'];
                $pawn->modifiedby = $this->Authen->getAuthenUserId();
                $pawn->rate = $data['newrate'];
                $pawn->status = 'RF';
                $text = '<br>วันที่ ' . $data['returndate'] . ' : ไถ่ถอน <br>' .
                        ' เงินต้น  ' . $data['newtotalmoney'] . ' ' . $wording . $data['money'] . 'บาท ' . ' ดอกเบี้ย ' . $data['newrate'] . '%<br>'
                        . ' ค่าดอกเบี้ย ' . $data['newinterrestrate'] . ' บาท ' . ' ส่วนลดค่าดอกเบี้ย ' . $data['discount'] . ' บาท ' . '<br><hr>';

                $amt = $data['newtotalmoney'] + $data['newinterrestrate'];
                $pawn->log_history = $text . $pawn->log_history;
                //'ไถ่ถอนวันที่ -' . $data['returndate'] . '- เงินต้น - ' . $data['newtotalmoney'] . ' ' . $wording . $data['money'] . 'บาท  -ดอกเบี้ย-' . $data['newrate'] . '%' . '-ค่าดอกเบี้ย-' . $data['newinterrestrate'] . ' บาท ' . 'ส่วนลดค่าดอกเบี้ย ' . $data['discount'] . ' บาท <br>';

                $pawn->modifiedby = $this->Authen->getAuthenUserId();

                $returnproduct = $pawn->pawn_lines;
                foreach ($returnproduct as $data) {
                    $qwhproduct = $this->WhProducts->find()
                            ->where(['WhProducts.product_id ' => $data['product_id']]);
                    $qwhproduct = $qwhproduct->first();


                    $qwhproduct->balance_amt -= 1;
                    $qwhproduct->modifiedby = $this->Authen->getAuthenUserId();


                    $this->WhProducts->save($qwhproduct);
                }
                $org = $this->Core->getLocalOrgId();
                $branch = $this->Core->getLocalBranchId();
                if ($this->Pawns->save($pawn)) {
                    $this->Flash->success(__('The pawn has been saved.'));

                    $this->makepayment($data['bank_account_id'], $data['thisdate'], $this->Core->getBanktype($data['bank_account_id']), $org, $branch, $pawn->bpartner_id, $pawn->id, $amt);


                    return $this->redirect(['action' => 'listpawn']);
                } else {
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            } else {
                $pawn->rate = $data['newrate'];
                $amt = $pawn->interrestrate;
                $pawn->interrestrate = $data['newinterrestrate'];
                $pawn->modifiedby = $this->Authen->getAuthenUserId();
                $pawn->totalmoney = $data['newtotalmoney'];
                $pawn->docdate = $this->Util->convertDate($data['date']);
                $pawn->expiredate = $this->Util->convertDate($data['returndate']);

                $text = '<br>วันที่ ' . $data['date'] . ' : ต่อดอก <br>' .
                        'วันที่ ' . $data['returndate'] . ' : สิ้นอายุ <br>' .
                        ' เงินต้น  ' . $data['newtotalmoney'] . ' ' . $wording . $data['money'] . 'บาท ' . ' ดอกเบี้ย ' . $data['newrate'] . '%<br>'
                        . ' ค่าดอกเบี้ย ' . $data['newinterrestrate'] . ' บาท ' . ' ส่วนลดค่าดอกเบี้ย ' . $data['discount'] . ' บาท ' . '<br><hr>';


                $pawn->log_history = $text . $pawn->log_history;
                //'ต่อดอกวันที่ -' . $data['date'] . '-สิ้นอายุวันที่ -' . $data['returndate'] . ' - เงินต้น - ' . $data['newtotalmoney'] . ' ' . $wording . $data['money'] . 'บาท  -ดอกเบี้ย-' . $data['newrate'] . '%' . '-ค่าดอกเบี้ย-' . $data['newinterrestrate'] . ' บาท ' . 'ส่วนลดค่าดอกเบี้ย ' . $data['discount'] . ' บาท <br>';

                if ($this->Pawns->save($pawn)) {
                    $this->Flash->success(__('The pawn has been saved.'));
                    $this->makepayment($data['bank_account_id'], $data['thisdate'], $this->Core->getBanktype($data['bank_account_id']), $org, $branch, $pawn->bpartner_id, $pawn->id, $amt);

                    return $this->redirect(['action' => 'listpawn']);
                } else {
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            }
        }
        $bankAccountList = $this->Core->getBankAccountList('BACC');
        $goldPrices = $this->GoldPrice->getPrice();
       
        $sellerList = $this->Core->getSellerList();
        
        $this->set(compact('bankAccountList', 'pawn','sellerList','goldPrices'));
    }

    private function verifyProduct($name = null, $type = null, $product_category_id = null, $percent = null, $design_id = null, $weight_id = null, $price = 0) {
        $q = $this->Products->find()
                ->where(['name' => $name]);
        $product = $q->first();

        if (is_null($product) || $product == '') {
            $product = $this->Products->newEntity();
            $product->name = $name;
            //$product->code = $this->Product->generateProductCode($product_category_id);
            $product->code = '_temp';
            $product->standard_price = 0;
            $product->actual_price = $price;
            $product->isactive = 'Y';
            $product->isstock = 'Y';
            $product->type = $type;
            $product->product_category_id = $product_category_id;
            $product->createdby = $this->Authen->getAuthenUserId();
            $product->org_id = $this->Core->getLocalOrgId();
            $product->weight_id = $weight_id;
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

    private function makepayment($bankAccountId = null, $docdate = null, $payment_method = null, $org_id = null, $branch_id = null, $bp_id = null, $pawn_id = null, $amt = null) {

        //Payment

        $payment = $this->PaymentProcess->createDraft($docdate, $payment_method, $bankAccountId, 'Y', 'N', $org_id, $branch_id, $bp_id);
        //Payment Line
        $this->PaymentProcess->createPaymentLine($payment->id, null, null, null, null, $pawn_id, null);
        //Complete payment
        //$this->log($invoice,'debug');
//            $receiptAmt = $data['subtotalamt'];
//            if($data['receiptamt'] < $receiptAmt){
//                $receiptAmt = $data['receiptamt'];
//            }
        $this->PaymentProcess->completePayment($payment->id, $amt, 0, $amt, $amt);
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
                ], ['Pawns.branch_id ' => $where,'Pawns.status'=>'CO']]);
//            $this->log($where, 'debug');
            $pawns = $q->toArray();

            echo json_encode($pawns);
            die();
            //$this->log($bpartners, 'debug');
        }
    }

}
