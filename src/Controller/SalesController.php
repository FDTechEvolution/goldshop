<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Sales Controller
 *
 *
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalesController extends AppController {

    public $DocumentCode = 'IV';
    public $Invoices = null;
    public $Payments = null;
    public $Warehouses = null;
    public $BankAccounts = null;
    public $ProductCategories = null;
    public $Orders = null;
    public $Weights = null;
    public $Designs = null;
    public $PaymentLines = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->loadComponent('DocSequent');
        $this->loadComponent('Bpartner');
        $this->loadComponent('InvoiceProcess');
        $this->loadComponent('OrderProcess');
        $this->loadComponent('PaymentProcess');
        $this->loadComponent('WarehouseProcess');
        $this->loadComponent('Gold');
        $this->loadComponent('Product');
        $this->loadComponent('SavingProcess');
        $this->loadComponent('MakePayment');

        $this->Invoices = TableRegistry::get('Invoices');
        $this->Payments = TableRegistry::get('Payments');
        $this->Warehouses = TableRegistry::get('Warehouses');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->ProductCategories = TableRegistry::get('ProductCategories');
        $this->Orders = TableRegistry::get('Orders');

        $this->loadComponent('GoldPrice');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->Weights = TableRegistry::get('Weights');
        $this->Designs = TableRegistry::get('Designs');

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$this->log($data, 'debug');
            //die();
            $bpartner_id = null;
            $DOCDATE = $data['docdate'];
            $CUSTOMERTYPE = $data['customer_type'];
            $RECEIPTAMT = $data['receiptamt'];
            $SAVINGAMT = (float) $data['savingamt'];
            $SELLER = $data['seller'];
            $WAREHOUSEID = $data['warehouse_id'];
            $DISCOUNT = $data['discountamt'];


            if ($CUSTOMERTYPE == 'save') {
                $bpartner_id = $data['bpartner_id'];
            } else {
                $bpartner = $this->Bpartner->getGuestCustomer();
                $bpartner_id = $bpartner->id;
            }

            $order_id = null;
            if (isset($data['order_id']) && $data['order_id'] != null && $data['order_id'] != '' && $data['order_id'] != 'undefined') {
                $order_id = $data['order_id'];
            }

            //Create payment
            //($paymentDate = null,$paymentMethod = null, $bankAccountId = null, $bpartnerId = null, $isReceipt = 'Y',$warehouseId = null, $type = null,$seller= null)
            $_CashAmt = $data['cash_amt'];
            $_TransferAmt = $data['tran_amt'];
            $_CreditAmt = $data['cred_amt'];
            $isMultiplePaymentMethod = false;
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



            $payment = $this->MakePayment->getSaveDraft($DOCDATE, $paymentMethod, $bankAccountId, $bpartner_id, 'Y', $WAREHOUSEID, 'SALES', $SELLER, $data['time']);

            $amount = 0;
            $seq = 1;
            $hasOrder = false;
            foreach ($data['product'] as $item) {
                $isOverPrice = 'N';
                $qty = $item['qty'];
                $price = $item['price'];
                $expectPrice = $item['actual_price'];
                $priceDiff = $expectPrice * 0.03;
                if ($price < ($expectPrice - $priceDiff)) {
                    $isOverPrice = 'Y';
                }
                $product_id = $item['product_id'];
                $warehouse_id = $item['warehouse_id'];

                $order_id = null;
                if (isset($item['order_id']) && $item['order_id'] != '' && $item['order_id'] != null && $item['order_id'] != 'undefined') {
                    $order_id = $item['order_id'];
                    $hasOrder = true;
                }

                //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
                $this->MakePayment->getSavePaymentLine($payment->id, $seq, null, $order_id, null, null, $product_id, $price, $qty, 'N', null, $isOverPrice);

                $amount = $amount + ($price * $qty);
                $seq++;
            }

            //Exchange
            $isExchange = 'N';
            if (isset($data['exchange_product']) && sizeof($data['exchange_product']) > 0) {
                $warehouseList = $this->Core->getWarehouseList(['type' => 'PURCHASE'], false, 'all');
                $purchasePayment = $this->MakePayment->getSaveDraft($payment->paymentdate, 'CASH', null, $payment->bpartner_id, 'N', $warehouseList[0]['id'], 'PURCHASE', $payment->seller);

                $totalExchangeAmt = 0;
                foreach ($data['exchange_product'] as $item) {
                    $qty = 1;
                    $price = $item['price'];
                    $design_id = null;
                    if (isset($item['design_id']) && $item['design_id'] != '') {
                        $design_id = $item['design_id'];
                    }

                    $product = $this->Product->getCreateTempProduct($item['product_name'], $item['product_category_id'], $item['percent'], $design_id, $item['weight'], $price);
                    $product_id = $product->id;
                    $warehouse_id = null;


                    $exchangeAmt = $amount - $price;
                    $description = 'ค่าแลกเปลี่ยน ' . $RECEIPTAMT;
                    $exchangamt = $RECEIPTAMT;
                    if($price == 0){
                        $exchangeAmt = 0;
                        $description = '';
                        $exchangamt = 0;
                    }
                    
                    //$amount = $amount - $exchangeAmt;
                    $totalExchangeAmt += $exchangeAmt;
                    
                    //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
                    $this->MakePayment->getSavePaymentLine($purchasePayment->id, $seq, $description, null, null, null, $product_id, $exchangeAmt, $qty, 'Y',null,'N',$exchangamt);

                    $seq++;
                    $isExchange = 'Y';
                }
                $this->MakePayment->completedPayment($purchasePayment, 'AP', $totalExchangeAmt, 0, 0, $totalExchangeAmt, $payment->id, $isExchange);
                $this->WarehouseProcess->updateStockByPayment($purchasePayment->id, 'N');
            }

            //Check has Saving account
            $receiptTotalAmt = $RECEIPTAMT;
            if ($CUSTOMERTYPE == 'save' && $SAVINGAMT > 0) {

                //$receiptTotalAmt = $receiptTotalAmt + $SAVINGAMT;
                //getSaveTransaction($bpartnerId = null, $bank_account_id = null, $docdate = null,$isDeposit = 'Y', $amount = 0, $description = null)
                $savingTransaction = $this->SavingProcess->getSaveTransaction($bpartner_id, null, $DOCDATE, 'N', $SAVINGAMT, 'ใช้เงินออมเพื่อซื้อสินค้าหน้าร้าน', null, $SELLER);
            } else {
                $SAVINGAMT = 0;
            }

            //Completed payment
            //completedPayment($payment = null,$documentCode = null,$amount =0,$discount = 0,$usesavingamt = 0,$totalAmount = 0)
            $totalAmount = $amount - $DISCOUNT - $SAVINGAMT;

            $this->MakePayment->completedPayment($payment, 'AR', $amount, $DISCOUNT, $SAVINGAMT, $totalAmount, null, $isExchange);

            //Update stock
            $this->WarehouseProcess->updateStockByPayment($payment->id, 'Y');


            //Update order
            if ($hasOrder) {
                $this->PaymentLines = TableRegistry::get('PaymentLines');
                $q = $this->PaymentLines->find()
                        ->where(['PaymentLines.payment_id' => $payment->id]);
                $payments = $q->toArray();
                foreach ($payments as $line) {
                    if ($line->order_id != null && $line->order_id != '') {
                        $this->OrderProcess->paidAndReceipt($line->order_id);
                    }
                }
            }

            $this->Flash->success(__('The invoice has been saved.'));
            if ($payment->bpartner_id == '0') {
                return $this->redirect(['action' => 'index']);
            } else {
                return $this->redirect(['controller' => 'promotions', 'action' => 'verify-bp-promotion', $payment->bpartner_id]);
            }
        }

        $docNo = $this->DocSequent->getLatest('AR');

        //$sellerList = $this->Core->getSellerList();

        $warehouseList = $this->Core->getWarehouseList(['type' => 'SALES']);
        $issales = 'Y';


        $percents = $this->Gold->getGoldPercent();

        $toDayTransactions = $this->toDayTransaction();

        $time = Time::now();
        $time = $time->i18nFormat('HHmm');

        //$weights = $this->Weights->find('list', ['group' => 'name', 'order' => 'name ASC']);
        $this->set(compact('percents'));

        $this->set(compact('docNo', 'warehouseList', 'issales', 'time', 'toDayTransactions'));
    }

    private function toDayTransaction() {
        $todayDate = new Date();
        //$wording = 'รายการขายประจำวันที่';
        $q = $this->Payments->find()
                ->select(['Payments.id', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno', 'Payments.usesavingamt', 'Payments.isexchange', 'Payments.docstatus'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'invoice_id', 'totalamount', 'isexchange', 'isoverprice','exchangamt'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
                        ],
                    ],
                    'PaymentMethodLines' => [
                        'fields' => ['payment_method', 'amount', 'payment_id'],
                        'BankAccounts' => ['fields' => ['account_name']]
                    ],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where(['Payments.isreceipt' => 'Y', 'Payments.branch_id' => $this->Core->getLocalBranchId(), 'Payments.type' => 'SALES', 'Payments.paymentdate' => $todayDate])
                ->order(['Payments.created' => 'DESC']);
        $payments = $q->toArray();
        //$this->log($payments,'debug');
        //Count total
        $totalAmt = 0;
        $weightAmt = 0;
        $_payments = $payments;
        foreach ($_payments as $index=> $payment) {
            if ($payment->docstatus != 'VO') {
                $totalAmt = $totalAmt + $payment->totalamt;
                foreach ($payment->payment_lines as $line) {
                    if ($line->has('product') && ($line->isexchange == 'N')) {
                        if ($line->product->has('weight')) {
                            $weightAmt = $weightAmt + $line->product->weight->value;
                        } else {
                            $weightAmt = $weightAmt + $line->product->manual_weight;
                        }
                    }
                }
            }
            
            if ($payment->isexchange == 'Y') {
                $q = $this->Payments->find()
                        ->contain(['PaymentLines' => ['Products']])
                        ->where(['Payments.payment_ref' => $payment->id]);
                $refPayments = $q->toArray();
                $payments[$index]['refs'] = $refPayments;
            }
        }

        $data = [
            'items' => $payments,
            'totalAmt' => $totalAmt,
            'weightAmt' => $weightAmt,
        ];
        $this->log($data,'debug');

        return $data;
    }

    public function showall() {
        $todayDate = new Date();
        $wording = 'รายการขายประจำวันที่';
        $q = $this->Payments->find()
                ->select(['Payments.id', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno', 'Payments.usesavingamt', 'Payments.isexchange', 'Payments.docstatus'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'invoice_id', 'totalamount', 'isexchange', 'isoverprice'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
                        ],
                    ],
                    'PaymentMethodLines' => [
                        'fields' => ['payment_method', 'amount', 'payment_id'],
                        'BankAccounts' => ['fields' => ['account_name']]
                    ],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where(['Payments.isreceipt' => 'Y', 'Payments.branch_id' => $this->Core->getLocalBranchId(), 'Payments.type' => 'SALES', 'Payments.paymentdate' => $todayDate])
                ->order(['Payments.created' => 'DESC']);
        $payments = $q->toArray();
        //$this->log($payments,'debug');
        //Count total
        $totalAmt = 0;
        $weightAmt = 0;
        foreach ($payments as $payment) {
            if ($payment->docstatus != 'VO') {
                $totalAmt = $totalAmt + $payment->totalamt;
                foreach ($payment->payment_lines as $line) {
                    if ($line->has('product') && ($line->isexchange == 'N')) {
                        if ($line->product->has('weight')) {
                            $weightAmt = $weightAmt + $line->product->weight->value;
                        } else {
                            $weightAmt = $weightAmt + $line->product->manual_weight;
                        }
                    }
                }
            }
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $txtdata = '%' . $this->request->getData('txt') . '%';

            $q = $this->Payments->find()
                    ->select(['Payments.id', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno', 'Payments.usesavingamt'])
                    ->contain([
                        'PaymentLines' => [
                            'fields' => ['payment_id', 'invoice_id', 'totalamount', 'isexchange'],
                            'Products' => [
                                'fields' => ['name', 'manual_weight'],
                                'Weights' => [
                                    'fields' => ['value']
                                ]
                            ],
                        ],
                        'PaymentMethodLines' => [
                            'fields' => ['payment_method', 'amount', 'payment_id'],
                            'BankAccounts' => ['fields' => ['account_name']]
                        ],
                        'Seller' => [
                            'fields' => ['firstname', 'lastname']
                        ],
                        'Bpartners' => [
                            'fields' => ['name']
                        ]
                    ])
                    ->where(['Payments.docno LIKE' => $txtdata, 'Payments.isreceipt' => 'Y', 'Payments.branch_id' => $this->Core->getLocalBranchId(), 'Payments.type' => 'SALES'])
                    ->order(['Payments.created' => 'DESC']);
            $payments = $q->toArray();
            $wording = 'รายการขาย';
            $todayDate = '';
        }

        $this->set(compact('payments', 'todayDate', 'totalAmt', 'weightAmt', 'wording'));
    }

    public function view($id = null) {
        $q = $this->Payments->find()
                ->contain(['PaymentMethodLines' => ['BankAccounts' => ['Banks']], 'PaymentLines' => ['Payments', 'Orders', 'Products', 'sort' => ['PaymentLines.created' => 'ASC']], 'Seller',
                    'Bpartners' => ['Orgs', 'Addresses'],
                    'Branches' => ['Orgs', 'Addresses']])
                ->where(['Payments.id' => $id]);
        $payment = $q->first();
        $refPayments = [];
        if ($payment->isexchange == 'Y') {
            $q = $this->Payments->find()
                    ->contain(['PaymentLines' => ['Products']])
                    ->where(['Payments.payment_ref' => $payment->id]);
            $refPayments = $q->toArray();
        }
        //$this->log($refPayments,'debug');
        $docStatusList = $this->TransactionCode->getStatusCode();
        $paymentMethod = $this->TransactionCode->getPaymentMethod();
        $branch = $payment->branch;
        $bpartner = $payment->bpartner;
        //$this->log($payment,'debug');
        $this->set(compact('payment', 'refPayments', 'docStatusList', 'branch', 'bpartner', 'paymentMethod'));
    }

    public function void($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        //$payment = $this->Payments->get($id);
        //$payment->docstatus = 'VO';
        //$payment->modifiedby = $this->Authen->getAuthenUserId();
        //if ($this->Payments->save($payment)) {
        $this->MakePayment->void($id);
        $this->WarehouseProcess->updateStockByPayment($payment->id, 'N');
        $this->Flash->success(__('ยกเลิกรายการแล้ว'));
        return $this->redirect(['action' => 'showall']);
        //} else {
        // $this->Flash->error(__('The pawn could not be cancle. Please, try again.'));
        // }

        return $this->redirect(['action' => 'view', $id]);
    }

}
