<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Purchase Controller
 *
 *
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseController extends AppController {

    public $DocumentCode = 'IV';
    public $Invoices = null;
    public $Payments = null;
    public $Users = null;
    public $Warehouses = null;
    public $BankAccounts = null;
    public $Products = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->loadComponent('DocSequent');
        $this->loadComponent('Bpartner');
        $this->loadComponent('InvoiceProcess');
        $this->loadComponent('MakePayment');
        $this->loadComponent('WarehouseProcess');
        $this->loadComponent('Gold');
        $this->loadComponent('Product');

        $this->Invoices = TableRegistry::get('Invoices');
        $this->Payments = TableRegistry::get('Payments');
        $this->Users = TableRegistry::get('Users');
        $this->Warehouses = TableRegistry::get('Warehouses');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->Products = TableRegistry::get('Products');

        $this->loadComponent('GoldPrice');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {

        //$invoice = $this->Invoices->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$this->log($data,'debug');
            //die();

            $bpartner_id = null;
            $customerType = $data['customer_type'];
            //$totalPaid = $data['receiptamt'];
            $seller = $data['seller'];
            $warehouse_id = $data['warehouse_id'];


            if ($customerType == 'save') {

                $bpartner_id = $data['bpartner_id'];
            } else {
                $bpartner = $this->Bpartner->getGuestCustomer();
                $bpartner_id = $bpartner->id;
            }

            $bankAccountId = null;
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

            if (!isset($data['time']) || is_null($data['time']) || $data['time'] == '') {
                $time = Time::now();
                $time = $time->i18nFormat('HHmm');
                $data['time'] = $time;
            }


            $payment = $this->MakePayment->getSaveDraft($data['docdate'], $data['payment_method'], $bankAccountId, $bpartner_id, 'N', $warehouse_id, 'PURCHASE', $seller, $data['time']);


            $totalAmount = 0;
            $seq = 1;

            foreach ($data['product'] as $item) {
                $isOverPrice = 'N';
                $price = $item['price'];
                $expectPrice = $item['expect_price'];
                $weight = $item['weight'];
                $diffPercent = 0.03;
                if ($weight < 7.5) {
                    $diffPercent = 0.05;
                }
                $priceDif = $expectPrice * $diffPercent;
                $description = $item['description'];
                $design_id = isset($item['design_id']) ? $item['design_id'] : null;
                $percent = isset($item['percent']) ? $item['percent'] : null;
                if ($price > ($expectPrice - $priceDif)) {
                    $isOverPrice = 'Y';
                }


                $product = $this->Product->getCreateTempProduct($item['product_name'], $item['product_category_id'], $percent, $design_id, $item['weight'], $price);

                //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
                $this->MakePayment->getSavePaymentLine($payment->id, $seq, $description, null, null, null, $product->id, $price, 1, 'N', null, $isOverPrice);

                $totalAmount = $totalAmount + $price;
                $seq++;
            }

            $this->MakePayment->completedPayment($payment, 'AP', $totalAmount, 0, 0, $totalAmount);
            $this->Flash->success(__('อัพเดทจำนวนเงินในบัญชีแล้ว'));

            //Update stock
            $this->Flash->success(__('บันทึกสินค้าในคลังสินค้าแล้ว'));
            $this->WarehouseProcess->updateStockByPayment($payment->id, 'N');
            $this->Flash->success(__('บันทึกข้อมูลการรับซื้อแล้ว'));

            //return $this->redirect(['action' => 'view',$payment->id]);
            return $this->redirect(['action' => 'index']);
        }

        $time = Time::now();
        $time = $time->i18nFormat('HH:mm');

        $docNo = $this->DocSequent->getLatest('AP');
        $warehouseList = $this->Core->getWarehouseList(['type' => 'PURCHASE']);

        $percents = $this->Gold->getGoldPercent();

        $productType = $this->TransactionCode->getProductType();

        $this->set(compact('docNo', 'warehouseList', 'percents', 'productType', 'time'));




        $toDayTransactions = $this->toDayTransaction();

        $this->set(compact('toDayTransactions'));
    }

    private function toDayTransaction() {
        $todayDate = new Date();
        $q = $this->Payments->find()
                ->select(['Payments.id', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno', 'Payments.isexchange', 'Payments.docstatus'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'invoice_id', 'isoverprice', 'amount'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
                        ],
                    ], 'BankAccounts' => ['fields' => ['account_name']],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where(['Payments.isreceipt' => 'N', 'Payments.isexchange' => 'N', 'Payments.paymentdate' => $todayDate, 'Payments.type' => 'PURCHASE', 'Payments.branch_id' => $this->Core->getLocalBranchId()])
                ->order(['Payments.docno' => 'DESC']);
        $payments = $q->toArray();

        //Count total
        $totalAmt = 0;
        $weightAmt = 0;
        $countItem = 0;

        foreach ($payments as $payment) {
            if ($payment->docstatus != 'VO') {
                $totalAmt = $totalAmt + $payment->totalamt;
                $countItem += sizeof($payment->payment_lines);
                foreach ($payment->payment_lines as $line) {
                    if ($line->has('product')) {

                        if ($line->product->has('weight')) {
                            $weightAmt = $weightAmt + $line->product->weight->value;
                        } else {
                            $weightAmt = $weightAmt + $line->product->manual_weight;
                        }
                    }
                }
            }
        }

        $data = [
            'items' => $payments,
            'totalAmt' => $totalAmt,
            'weightAmt' => $weightAmt,
            'countItem' => $countItem
        ];

        return $data;
    }

    public function view($id = null) {
        $q = $this->Payments->find()
                ->contain(['PaymentLines' => ['Payments', 'Orders', 'Products'], 'Seller', 'BankAccounts' => ['Banks'],
                    'Bpartners' => ['Orgs', 'Addresses'],
                    'Branches' => ['Orgs', 'Addresses']])
                ->where(['Payments.id' => $id]);
        $payment = $q->first();

        $docStatusList = $this->TransactionCode->getStatusCode();
        $bankTypes = $this->TransactionCode->getPaymentMethod('list');
        $branch = $payment->branch;
        $bpartner = $payment->bpartner;
        $this->set(compact('payment', 'docStatusList', 'branch', 'bpartner', 'bankTypes'));
    }

    public function add() {
        $purchase = $this->Purchase->newEntity();
        if ($this->request->is('post')) {
            $purchase = $this->Purchase->patchEntity($purchase, $this->request->getData());
            if ($this->Purchase->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $this->set(compact('purchase'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $purchase = $this->Purchase->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchase = $this->Purchase->patchEntity($purchase, $this->request->getData());
            if ($this->Purchase->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $this->set(compact('purchase'));
    }

    public function showall() {
        $todayDate = new Date();
        $wording = 'รายการรับซื้อประจำวันที่';
        $q = $this->Payments->find()
                ->select(['Payments.id', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno', 'Payments.isexchange', 'Payments.docstatus'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'invoice_id', 'isoverprice', 'amount'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
                        ],
                    ], 'BankAccounts' => ['fields' => ['account_name']],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where(['Payments.isreceipt' => 'N', 'Payments.isexchange' => 'N', 'Payments.paymentdate' => $todayDate, 'Payments.type' => 'PURCHASE', 'Payments.branch_id' => $this->Core->getLocalBranchId()])
                ->order(['Payments.created' => 'DESC']);
        $payments = $q->toArray();

        //Count total
        $totalAmt = 0;
        $weightAmt = 0;
        $countItem = 0;

        foreach ($payments as $payment) {
            if ($payment->docstatus != 'VO') {
                $totalAmt = $totalAmt + $payment->totalamt;
                $countItem += sizeof($payment->payment_lines);
                foreach ($payment->payment_lines as $line) {
                    if ($line->has('product')) {

                        if ($line->product->has('weight')) {
                            $weightAmt = $weightAmt + $line->product->weight->value;
                        } else {
                            $weightAmt = $weightAmt + $line->product->manual_weight;
                        }
                    }
                }
            }
        }
        //$this->log($payments,'debug');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $txtdata = '%' . $this->request->getData('txt') . '%';

            $q = $this->Payments->find()
                    ->select(['Payments.id', 'Payments.created', 'Payments.amount', 'Payments.discount', 'Payments.totalamt', 'Payments.paymentdate', 'Payments.docno'])
                    ->contain([
                        'PaymentLines' => [
                            'fields' => ['payment_id', 'invoice_id'],
                            'Products' => [
                                'fields' => ['name', 'manual_weight']
                            ],
                        ], 'BankAccounts' => ['fields' => ['account_name']],
                        'Seller' => [
                            'fields' => ['firstname', 'lastname']
                        ],
                        'Bpartners' => [
                            'fields' => ['name']
                        ]
                    ])
                    ->where(['Payments.docno LIKE' => $txtdata, 'Payments.isreceipt' => 'N', 'Payments.type' => 'PURCHASE', 'Payments.branch_id' => $this->Core->getLocalBranchId()])
                    ->order(['Payments.created' => 'DESC']);
            $payments = $q->toArray();
            $wording = 'รายการรับซื้อ';
            $todayDate = '';
        }

        $this->set(compact('payments', 'todayDate', 'totalAmt', 'weightAmt', 'wording', 'countItem'));
    }

    public function void($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        $payment->docstatus = 'VO';
        $payment->modifiedby = $this->Authen->getAuthenUserId();
        if ($this->Payments->save($payment)) {
            $this->MakePayment->void($payment->id);
            $this->WarehouseProcess->updateStockByPayment($payment->id, 'Y');

            $this->Flash->success(__('ยกเลิกรายการแล้ว'));
            return $this->redirect(['action' => 'showall']);
        } else {
            $this->Flash->error(__('The pawn could not be cancle. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $id]);
    }

}
