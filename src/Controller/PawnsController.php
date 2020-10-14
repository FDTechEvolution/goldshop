<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\I18n\Number;
use Cake\Datasource\ConnectionManager;

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
    public $Payments = null;
    public $Connection = null;

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
        $this->loadComponent('Pawn');
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

            $pawn = $this->Pawn->createDraft($data);
            if ($pawn) {


                //Create lline
                $isOverPrice = 'N';
                $totalAmout = 0;
                foreach ($data['price'] as $index => $line) {
                    $design = null;
                    $product = $this->Pawn->verifyProduct($data['detail'][$index], $data['product_category_id'][$index], $data['percent'][$index], $design, $data['weight'][$index], 0);
                    //$product = $this->Product->getCreateTempProduct($data['detail'][$index], $data['product_category_id'][$index], $data['percent'][$index], $design, $data['weight'][$index],0);

                    $price = $data['price'][$index];
                    $totalAmout += floatval($price);
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
                    $pawnLine['createdby'] = $this->Authen->getAuthenUserId();

                    $img_id = $this->UploadImage->uploadpawnimage($data['img'][$index]);
                    $pawnLine['image_id'] = $img_id['image_id'];
                    if (!$this->PawnLines->save($pawnLine)) {
                        $this->log($pawnLine->errors(), 'debug');
                    }
                }


                $startDate = $this->Util->convertDate($data['date']);
                $endDate = $this->Util->convertDate($data['expiredate']);
                $rateType = str_replace('%', '', $data['type']);
                //$interestamt = $this->Pawn->getCalInterestRate($totalAmout, $rateType, $pawn->docdate, $pawn->expiredate);
                $interestamt = 0;

                $pawn->totalmoney = $totalAmout;
                $pawn->type = $rateType;
                $pawn->status = 'CO';


                if ($isOverPrice == 'Y') {
                    $pawn->isoverprice = $isOverPrice;
                }

                $pawn = $this->Pawns->save($pawn);

                $payment = $this->getSavePayment($data['bank_account_id'], $data['date'], $data['payment_method'], $pawn->bpartner_id, $pawn->id, $data['totalmoney'], 'N', 'PAWN', $data['seller']);
                $pawntransaction = $this->Pawn->createPawnTransaction($pawn, $data['totalmoney'], 'NEW', $rateType, $interestamt, $startDate, $endDate, $data['seller'], null, $payment['id']);


                $this->Flash->success(__('The pawn has been saved.'));
                return $this->redirect(['controller' => 'pawns', 'action' => 'view', $pawn->id]);
            } else {
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            }
        }

        $warehouseList = $this->Core->getWarehouseList(['type' => 'PAWN']);

        $percents = $this->Gold->getGoldPercent();

        $this->set(compact('warehouseList', 'pawn', 'percents'));
    }

    public function edit($id = null) {
        $pawn = $this->Pawns->get($id, [
            'contain' => ['Orgs', 'Branches' => ['Addresses'], 'Bpartners' => ['Addresses'], 'BankAccounts', 'PawnLines' => ['Products', 'Images']]
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $oldPawn = $pawn;

            $data = $this->request->getData();
            $rateType = str_replace('%', '', $data['type']);
            //$this->log($data, 'debug');

            $pawn = $this->Pawn->createDraft($data);
            if ($pawn) {
                $startDate = $this->Util->convertDate($data['date']);
                $endDate = $this->Util->convertDate($data['expiredate']);

                //Create lline
                //$isOverPrice = 'N';
                foreach ($data['price'] as $index => $line) {
                    $design = null;
                    $product_id = $data['product_id'][$index];
                    $product = null;
                    if (is_null($product_id) || $product_id == '') {
                        $product = $this->Pawn->verifyProduct($data['detail'][$index], $data['product_category_id'][$index], $data['percent'][$index], $design, $data['weight'][$index], 0);

                        $img_id = $this->UploadImage->uploadpawnimage($data['img'][$index]);
                        $pawnLine['image_id'] = $img_id['image_id'];
                    } else {
                        $product = $this->Products->get($product_id);
                    }

                    $price = $data['price'][$index];
                    $expectPrice = $data['expect_price'][$index];
                    $priceDif = $expectPrice * 0.03;
                    /*
                      if ($price > ($priceDif + $expectPrice)) {
                      $isOverPrice = 'Y';
                      }
                     * 
                     */

                    $pawnLine = $this->PawnLines->newEntity();
                    $pawnLine['pawn_id'] = $pawn->id;
                    $pawnLine['seq'] = $index + 1;
                    $pawnLine['product_id'] = $product->id;
                    //$pawnLine['description'] = $data['des'][$index];
                    $pawnLine['amount'] = $price;
                    $pawnLine['weight'] = $data['weight'][$index];
                    $pawnLine['createdby'] = $this->Authen->getAuthenUserId();


                    if (!$this->PawnLines->save($pawnLine)) {
                        $this->log($pawnLine->errors(), 'debug');
                    }
                }

                /*
                  if ($isOverPrice == 'Y') {
                  $pawn->isoverprice = $isOverPrice;
                  }
                 * 
                 */
                $pawn->status = 'CO';
                $pawn = $this->Pawns->save($pawn);

                $payment = $this->getSavePayment($data['bank_account_id'], $data['date'], $data['payment_method'], $pawn->bpartner_id, $pawn->id, $data['totalmoney'], 'N', 'PAWN', $data['seller']);

                //createPawnTransaction($pawn, $amount = 0, $type = 'NEW', $rate = 3, $interestAmt = 0, $startDate, $endDate, $seller = null, $description = null, $paymentId = null)
                $pawntransaction = $this->Pawn->createPawnTransaction($pawn, $data['totalmoney'], 'NEW', $rateType, 0, $startDate, $endDate, $data['seller'], null, $payment['id']);


                //Clear old pawn
                $oldPawn->isactive = 'N';
                $this->Pawns->save($oldPawn);


                $this->Flash->success(__('The pawn has been saved.'));
                return $this->redirect(['controller' => 'pawns', 'action' => 'listpawn']);
            } else {
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            }
        }

        $docStatusList = $this->TransactionCode->getStatusCode();
        $percents = $this->Gold->getGoldPercent();
        $warehouseList = $this->Core->getWarehouseList(['type' => 'PAWN']);

        $this->set(compact('docStatusList', 'pawn', 'percents', 'warehouseList'));
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
            'contain' => [
                'Orgs',
                'Warehouses' => ['Branches'],
                'Branches' => ['Addresses'],
                'Bpartners', 'BankAccounts',
                'PawnLines' => ['Products', 'Images'],
                'PawnTransactions' => ['conditions' => ['type !=' => 'VO'], 'sort' => ['created' => 'DESC']]]
        ]);
        $docStatusList = $this->TransactionCode->getStatusCode();
        $pawnTransactionType = $this->Pawn->pawnTransactionType();
        //$this->log($pawn,'debug');
        $this->set(compact('docStatusList', 'pawn', 'pawnTransactionType'));
    }

    public function void($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $pawn = $this->Pawns->get($id, ['contain' => ['PaymentLines']]);
        $pawn->status = 'VO';
        $pawn->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->voidProcess($id)) {
            $this->Flash->success(__('ยกเลิกรายการรับจำนำนี้แล้ว'));
        }

        return $this->redirect(['action' => 'view', $id]);
    }

    public function needEdit($id) {
        if ($this->voidProcess($id)) {
            return $this->redirect(['action' => 'edit', $id]);
        } else {
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    private function voidProcess($id) {
        $pawn = $this->Pawns->get($id, ['contain' => ['PaymentLines']]);
        $pawn->status = 'VO';
        $pawn->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->Pawns->save($pawn)) {
            if (sizeof($pawn->payment_lines) > 0) {
                $paymentLine = $pawn['payment_lines'][0];
                $this->MakePayment->void($paymentLine['payment_id']);
            }

            return true;

            //$this->Flash->success(__('ยกเลิกรายการรับจำนำนี้แล้ว'));
        } else {
            $this->Flash->error(__('The pawn could not be cancle. Please, try again.'));
            return false;
        }
    }

    public function unvoid($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $pawn = $this->Pawns->get($id, ['contain' => ['PaymentLines']]);
        $pawn->status = 'DR';
        $pawn->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->Pawns->save($pawn)) {
            if (sizeof($pawn->payment_lines) > 0) {
                $paymentLine = $pawn['payment_lines'][0];
                $this->MakePayment->unvoid($paymentLine['payment_id']);
            }

            $this->Flash->success(__('คืนค่าสถานะเป็นปกติแล้ว'));
        } else {
            $this->Flash->error(__('The pawn could not be cancle. Please, try again.'));
        }

        return $this->redirect(['action' => 'edit', $id]);
    }

    public function extend($id = null) {


        $pawn = $this->Pawns->get($id, [
            'contain' => [
                'Warehouses' => ['Branches'],
                'Bpartners' => ['Orgs', 'Addresses'],
                'PawnLines' => ['Products', 'Images'],
                'Branches' => ['Orgs', 'Addresses'],
                'PawnTransactions' => [
                    'conditions' => ['PawnTransactions.type !=' => 'VO'],
                    'sort' => ['PawnTransactions.created' => 'DESC']
                ]]
        ]);
        $totalMonth = $this->Pawn->getTotalMonthBetweenDate('2020-02-02', $pawn->expiredate);
        // $interestRateAmt = $this->Pawn->getCalInterestRate();



        $org = $this->Core->getLocalOrgId();
        $branch = $this->Core->getLocalBranchId();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //$this->log($data, 'debug');


            $wording = '';

            $time = Time::now();
            /*
              $strLog = sprintf('<strong>#%s ต่อดอก#</strong><br/>', $time->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE));
              $strLog = $strLog . sprintf('- กำหนดเดิม %s - %s<br/>', $pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE), $pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE));
              $strLog = $strLog . sprintf('- จ่ายดอกเบี้ยของ %s - %s ดอกเบี้ย %s จำนวน %s บาท ส่วนลด %s บาท รับเงินจริง %s บาท<br/>', $pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE), $data['returndate'], $data['type'], $data['interrestrate'], $data['discountamt'], $data['receiptamt']);

             */

            $currentExpireDate = $this->Util->convertDate($data['current_expiredate']);
            $newExpireDate = $this->Util->convertDate($data['expiredate']);
            $docDate = $pawn->docdate;

            $interrestAmt = $this->Pawn->getCalInterestRate($pawn->totalmoney, $data['type'], $docDate, $newExpireDate);
            //$this->log($interrestAmt,'debug');
            // die();
            $subtotalamt = $data['subtotalamt'];
            $discountamt = $data['discountamt'];
            $savingamt = $data['savingamt'];
            $receiptamt = $data['receiptamt'];

            $expectReceiptamt = $subtotalamt - $discountamt - $savingamt;
            if ($receiptamt >= $expectReceiptamt) {
                $receiptamt = $expectReceiptamt;

                //$amt = $data['totalamt'];
                $pawn->interrestrate = $interrestAmt;
                $pawn->modifiedby = $this->Authen->getAuthenUserId();
                //$pawn->totalmoney = $data['totalmoney'];
                //$pawn->docdate = $newExpireDate;

                $nextExpireDate = new Date($newExpireDate);
                $startDate = $newExpireDate;
                $nextExpireDate = $nextExpireDate->modify('+4 months');
                //$nextExpireDate = $nextExpireDate->modify('+4 months');
                $pawn->startdate = $startDate;
                $pawn->expiredate = $nextExpireDate;
                $pawn->type = $data['type'];
                $pawn->status = $this->Pawn->PAWN_EXTEND_STATUS;

                //$pawn->log_history = $strLog . $pawn->log_history;
                //'ต่อดอกวันที่ -' . $data['date'] . '-สิ้นอายุวันที่ -' . $data['returndate'] . ' - เงินต้น - ' . $data['newtotalmoney'] . ' ' . $wording . $data['money'] . 'บาท  -ดอกเบี้ย-' . $data['newrate'] . '%' . '-ค่าดอกเบี้ย-' . $data['newinterrestrate'] . ' บาท ' . 'ส่วนลดค่าดอกเบี้ย ' . $data['discount'] . ' บาท <br>';

                if ($this->Pawns->save($pawn)) {
                    //createPawnTransaction($pawn,$amount = 0,$type = 'NEW',$rate = 3,$interestAmt =0,$startDate,$endDate,$seller = null)
                    //Payment
                    $_CashAmt = $data['cash_amt'];
                    $_TransferAmt = $data['tran_amt'];
                    $_CreditAmt = $data['cred_amt'];
                    $countPaymentMethod = 0;
                    $paymentMethods = [];
                    if ($_CashAmt > 0) {
                        $countPaymentMethod++;
                        array_push($paymentMethods, ['payment_method' => 'CASH', 'amount' => $_CashAmt, 'bank_account_id' => null]);
                    }
                    if ($_TransferAmt > 0) {
                        $countPaymentMethod++;
                        array_push($paymentMethods, ['payment_method' => 'TRAN', 'amount' => $_TransferAmt, 'bank_account_id' => $data['bank_account_id']]);
                    }
                    if ($_CreditAmt > 0) {
                        $countPaymentMethod++;
                        array_push($paymentMethods, ['payment_method' => 'CRED', 'amount' => $_CreditAmt, 'bank_account_id' => $data['credit_account_id']]);
                    }


                    $bankAccountId = null;
                    $paymentMethod = null;
                    if ($countPaymentMethod > 1) {
                        $paymentMethod = $paymentMethods;
                        $bankAccountId = null;
                    } else {
                        $paymentMethod = $data['payment_method'];
                        if (isset($data['bank_account_id'])) {
                            $bankAccountId = $data['bank_account_id'];
                        }
                        $creditAccountId = null;
                        if (isset($data['credit_account_id'])) {
                            $creditAccountId = $data['credit_account_id'];
                        }
                        if ($data['payment_method'] == 'CRED') {
                            $bankAccountId = $creditAccountId;
                        }
                    }

                    $payment = $this->getSavePayment($bankAccountId, $data['expiredate'], $paymentMethod, $pawn->bpartner_id, $pawn->id, $receiptamt, 'Y', 'PAWN_INTEREST', $data['seller']);
                    $this->Pawn->createPawnTransaction($pawn, 0, 'RN', $pawn->type, $interrestAmt, $docDate, $newExpireDate, $data['seller'], $data['description'], $payment->id);

                    $this->Flash->success(__('The pawn has been saved.'));


                    return $this->redirect(['controller' => 'pawns', 'action' => 'view', $id]);
                } else {
                    $this->log($data, 'debug');
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('จำนวนเงินมีข้อผิดพลาด'));
            }
        }

        $rates = $this->Pawn->getPawnRate();
        $pawnTransactionType = $this->Pawn->pawnTransactionType();

        $this->set(compact('pawn', 'rates', 'totalMonth', 'pawnTransactionType'));
    }

    public function redeem($id = null) {
        $pawn = $this->Pawns->get($id, [
            'contain' => [
                'Warehouses' => ['Branches'],
                'Bpartners' => ['Orgs', 'Addresses'],
                'PawnLines' => ['Products', 'Images'],
                'Branches' => ['Orgs', 'Addresses'],
                'PawnTransactions' => [
                    'conditions' => ['PawnTransactions.type !=' => 'VO'],
                    'sort' => ['PawnTransactions.created' => 'DESC']
                ]]
        ]);
        $totalMonth = $this->Pawn->getTotalMonthBetweenDate('2020-02-02', $pawn->expiredate);
        // $interestRateAmt = $this->Pawn->getCalInterestRate();



        $org = $this->Core->getLocalOrgId();
        $branch = $this->Core->getLocalBranchId();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $this->log($data, 'debug');


            $currentExpireDate = $this->Util->convertDate($data['current_expiredate']);
            $returnDate = $this->Util->convertDate($data['returndate']);

            //$pawn->returndate = $this->Util->convertDate($data['returndate']);
            //$interrestAmt = $this->Pawn->getCalInterestRate($pawn->totalmoney, $data['type'], $currentExpireDate, $returnDate);
            $interrestAmt = floatval($data['interestamt']);
            $interrestAmt2 = floatval($data['interestamt2']);
            $interrestAmt = $interrestAmt + $interrestAmt2;

            //$this->log($interrestAmt,'debug');
            // die();
            $subtotalamt = $data['subtotalamt'];
            $discountamt = $data['discountamt'];
            $savingamt = $data['savingamt'];
            $receiptamt = $data['receiptamt'];
            $interrestAmt = $interrestAmt-$discountamt;

            $expectReceiptamt = $subtotalamt - $discountamt - $savingamt;
            if ($receiptamt >= $expectReceiptamt) {
                //$receiptamt = $expectReceiptamt;

                //$amt = $data['totalamt'];
                $pawn->interrestrate = $interrestAmt;
                $pawn->modifiedby = $this->Authen->getAuthenUserId();
                //$pawn->totalmoney = $data['totalmoney'];
                //$pawn->docdate = $currentExpireDate;
                //$pawn->expiredate = $newExpireDate;
                $pawn->type = $data['type'];
                $pawn->returndate = $returnDate;
                $pawn->status = 'RF';

                if ($this->Pawns->save($pawn)) {



                    //Payment
                    $_CashAmt = $data['cash_amt'];
                    $_TransferAmt = $data['tran_amt'];
                    $_CreditAmt = $data['cred_amt'];
                    $countPaymentMethod = 0;
                    $paymentMethods = [];
                    if ($_CashAmt > 0) {
                        $countPaymentMethod++;
                        array_push($paymentMethods, ['payment_method' => 'CASH', 'amount' => $_CashAmt, 'bank_account_id' => null]);
                    }
                    if ($_TransferAmt > 0) {
                        $countPaymentMethod++;
                        array_push($paymentMethods, ['payment_method' => 'TRAN', 'amount' => $_TransferAmt, 'bank_account_id' => $data['bank_account_id']]);
                    }
                    if ($_CreditAmt > 0) {
                        $countPaymentMethod++;
                        array_push($paymentMethods, ['payment_method' => 'CRED', 'amount' => $_CreditAmt, 'bank_account_id' => $data['credit_account_id']]);
                    }


                    $bankAccountId = null;
                    $paymentMethod = null;
                    if ($countPaymentMethod > 1) {
                        $paymentMethod = $paymentMethods;
                        $bankAccountId = null;
                    } else {
                        $paymentMethod = $data['payment_method'];
                        if (isset($data['bank_account_id'])) {
                            $bankAccountId = $data['bank_account_id'];
                        }
                        $creditAccountId = null;
                        if (isset($data['credit_account_id'])) {
                            $creditAccountId = $data['credit_account_id'];
                        }
                        if ($data['payment_method'] == 'CRED') {
                            $bankAccountId = $creditAccountId;
                        }
                    }

                    $payment = $this->getSavePayment($bankAccountId, null, $paymentMethod, $pawn->bpartner_id, $pawn->id, $receiptamt, 'Y', 'PAWN_INTEREST', NULL);

                    //createPawnTransaction($pawn,$amount = 0,$type = 'NEW',$rate = 3,$interestAmt =0,$startDate,$endDate,$seller = null)
                    $this->Pawn->createPawnTransaction($pawn, $receiptamt - $interrestAmt, 'RF', $pawn->type, $interrestAmt, $pawn->docdate, $pawn->returndate, $data['seller'], null, $payment['id'],$discountamt);

                    $this->Flash->success(__('The pawn has been saved.'));


                    return $this->redirect(['controller' => 'pawns', 'action' => 'view', $id]);
                } else {
                    $this->log($data, 'debug');
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('จำนวนเงินมีข้อผิดพลาด'));
            }
        }

        $pawnTransactionType = $this->Pawn->pawnTransactionType();
        $rates = $this->Pawn->getPawnRate();

        $this->set(compact('pawn', 'rates', 'totalMonth', 'pawnTransactionType'));
    }

    public function expire($id = null) {
        $todayDate = new Date();
        $todayDate = $todayDate->i18nFormat('yyyy-MM-dd');
        $warehouseList = $this->Core->getWarehouseList(['ispurchase' => 'Y'], false, 'all');
        $pawn = $this->Pawns->get($id, ['contain' => ['PawnLines']]);
        $pawn->status = 'EXPIRE';
        $pawn->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->Pawns->save($pawn)) {
            $this->Flash->success(__('รายการนี้หลุดจำนำแล้ว'));
            //getSaveDraft($docdate, $type, $from_warehouse = null, $to_warehouse = null, $seller = null)
            $goodsTran = $this->GoodsTransaction->getSaveDraft($todayDate, 'PX', $pawn->warehouse_id, $warehouseList[0]['id'], null);
            foreach ($pawn->pawn_lines as $index => $line) {
                //createLine($goods_transaction_id, $product_id, $qty = 0, $description = null, $seq = 0)
                $this->GoodsTransaction->createLine($goodsTran->id, $line->product_id, 1, $line->description, $index);
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

        $title = '';
        $pawns = [];
        $weightAmt = 0;
        $totalAmt = 0;
        $wheres = ['Pawns.branch_id ' => $branchId, 'Pawns.isactive' => 'Y'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $postData = $this->request->getData();
            $type = $postData['type'];
            $startDate = $postData['start_date'];
            $endDate = $postData['end_date'];
            $status = $postData['docstatus'];


            if ($type == 'today') {
                $title = 'รายการจำนำประจำวันที่ ' . $todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE);
                array_push($wheres, ['Pawns.docdate' => $todayDate]);
            } else if ($type == 'week') {
                
            } else if ($type == 'month') {
                
            } else if ($type == 'all') {
                $title = 'รายการจำนำทั้งหมด';
            } else if ($type == 'select_date') {
                $startDate = $this->Util->convertDate($startDate);
                $endDate = $this->Util->convertDate($endDate);

                $_startDate = new Date($startDate);
                $_endDate = new Date($endDate);

                array_push($wheres, ['Pawns.docdate >=' => $_startDate]);
                array_push($wheres, ['Pawns.docdate <=' => $_endDate]);
            }

            if ($status != 'all') {
                array_push($wheres, ['Pawns.status' => $status]);
            }

            /*
             * $title = 'รายการหลุดจำนำทั้งหมด';
              $q = $this->Pawns->find()
              ->contain(['Bpartners', 'PawnLines'])
              ->where(['Pawns.expiredate <' => $todayDate])
              ->order(['Pawns.docdate' => 'DESC']);
              $pawns = $q->toArray();
             */
        } else {
            $title = 'รายการจำนำทั้งหมด';
            //$title = 'รายการจำนำประจำวันที่ ' . $todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE);
            // array_push($wheres,['Pawns.docdate' => $todayDate]);
        }


        $pawns = $this->Pawns->find()
                ->contain(['Bpartners', 'PawnLines' => ['Products']])
                ->where($wheres)
                ->order(['Pawns.docno' => 'DESC', 'Pawns.docdate' => 'DESC'])
                ->toArray();



        $docStatusList = $this->TransactionCode->getStatusCode();
        //$docStatusOption = $this->TransactionCode->getStatusCode('list');
        $this->set(compact('pawns', 'docStatusList', 'todayDate', 'totalAmt', 'weightAmt', 'title', 'type'));
    }

    public function find() {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $searchText = $data['search_text'];

            if ($searchText !== '') {
                $branchId = $this->Core->getLocalBranchId();

                $whereBranch = "p.branch_id != '0'";
                if ($branchId != '0') {
                    $whereBranch = "p.branch_id = '" . $branchId . "'";
                }
                $this->Connection = ConnectionManager::get('default');

                $sql = "select p.id,p.status,p.docno,bp.name,p.totalmoney,p.log_history from pawns p join bpartners bp on p.bpartner_id = bp.id where " . $whereBranch . " and (bp.name like '%" . $searchText . "%' or p.docno like '" . $searchText . "%') order by p.docno ASC";

                $this->log($sql, 'debug');
                $result = $this->Connection->execute($sql, [])
                        ->fetchAll('assoc');

                $docStatusList = $this->TransactionCode->getStatusCode();

                $this->set(compact('result', 'searchText', 'docStatusList'));
            }
        }
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

                    $this->getSavePayment($data['bank_account_id'], $data['thisdate'], $data['payment_method'], $pawn->bpartner_id, $pawn->id, $amt, 'Y', 'PAWN_RETURN', $data['seller']);


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
                    $this->getSavePayment($data['bank_account_id'], $data['thisdate'], $data['payment_method'], $pawn->bpartner_id, $pawn->id, $amt, 'Y', 'PAWN_INTEREST', $data['seller']);

                    return $this->redirect(['controller' => 'pos', 'action' => 'index']);
                } else {
                    $this->log($pawn->errors(), 'debug');
                }
                $this->Flash->error(__('The pawn could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('pawn'));
    }

    private function verifyProduct($name = null, $product_category_id = null, $percent = null, $design_id = null, $weight = 0, $price = 0) {
        $product = $this->Products->newEntity();
        $product->name = $name;

        $product->code = '_temp';
        $product->standard_price = 0;
        $product->actual_price = $price;
        $product->isactive = 'Y';
        $product->manual_weight = $weight;
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
    }

    private function getSavePayment($bankAccountId = null, $docdate = null, $payment_method = null, $bp_id = null, $pawn_id = null, $amt = null, $isreceipt = 'N', $paymentType = null, $seller = null) {
        //Payment
        //getSaveDraft($paymentDate = null,$paymentMethod = null, $bankAccountId = null, $bpartnerId = null, $isReceipt = 'Y',$warehouseId = null, $type = null,$seller= null)
        $payment = $this->MakePayment->getSaveDraft($docdate, $payment_method, $bankAccountId, $bp_id, $isreceipt, null, $paymentType, $seller);
        //Payment Line
        //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
        $this->MakePayment->getSavePaymentLine($payment->id, 1, null, null, null, null, null, $amt, 1);
        //completedPayment($payment = null,$documentCode = null,$amount =0,$discount = 0,$usesavingamt = 0,$totalAmount = 0)


        $this->MakePayment->completedPayment($payment, ($isreceipt == 'Y' ? 'AR' : 'AP'), $amt, 0, 0, $amt);

        return $payment;
    }

    public function listreturnpawn() {
        $todayDate = new Date();

        $datest = new Time();
        $dateed = new Time();
        $datest->setTime(0, 0, 0);
        $dateed->setTime(24, 0, 0);
        $branch = $this->Core->getLocalBranchId();


        $q = $this->PawnTransactions->find('all', [
            'conditions' => ['Pawns.branch_id ' => $branch, 'PawnTransactions.type !=' => 'NEW'],
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

}
