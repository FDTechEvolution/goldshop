<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrdersController extends AppController {

    public $DocumentCode = 'SO'; //Standard Order
    public $Invoices = null;
    public $Payments = null;
    public $Users = null;
    public $Warehouses = null;
    public $BankAccounts = null;
    public $Products = null;
    public $Orders = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->loadComponent('DocSequent');
        $this->loadComponent('Bpartner');
        $this->loadComponent('OrderProcess');
        $this->loadComponent('PaymentProcess');
        $this->loadComponent('MakePayment');
        $this->loadComponent('WarehouseProcess');

        $this->Orders = TableRegistry::get('Orders');
        $this->Payments = TableRegistry::get('Payments');
        $this->Users = TableRegistry::get('Users');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->Products = TableRegistry::get('Products');

        $this->loadComponent('GoldPrice');
        $this->loadComponent('Gold');
        $this->loadComponent('Product');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$this->log($data, 'debug');

            $bpartner_id = null;
            $customerType = $data['customer_type'];
            //$totalPaid = $data['receiptamt'];
            $seller = $data['seller'];
            $paidAmt = $data['receiptamt'];

            if ($customerType == 'save') {

                $bpartner_id = $data['bpartner_id'];
            } else {
                $bpartner = $this->Bpartner->getGuestCustomer();
                $bpartner_id = $bpartner->id;
            }

            $order = $this->OrderProcess->createDraft($data['docdate'], $data['duedate'], 'Y', $bpartner_id, $seller,$data['docno']);
            $totalAmount = 0;
            foreach ($data['product'] as $item) {
                $qty = $item['qty'];
                $price = $item['price'];
                $product_id = $item['product_id'];

                $img_id = $this->UploadImage->uploadOrder($item['img']);
                //$this->log($img_id, 'debug');

                $_totalAmount = $this->OrderProcess->createLine($order->id, $product_id, $qty, $price, $img_id['image_id']);
                $totalAmount = $totalAmount + $_totalAmount;
            }
            $order = $this->OrderProcess->completed($order->id, $totalAmount, $paidAmt);

            //Update payment
            if ($paidAmt > 0) {
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
                    $paymentMethod = $paymentMethods[0]['payment_method'];
                    if (isset($data['bank_account_id'])) {
                        $bankAccountId = $data['bank_account_id'];
                    }
                    $creditAccountId = null;
                    if (isset($data['credit_account_id'])) {
                        $creditAccountId = $data['credit_account_id'];
                    }
                    if ($paymentMethod == 'CRED') {
                        $bankAccountId = $creditAccountId;
                    }
                }


                $payment = $this->MakePayment->getSaveDraft($data['docdate'], $paymentMethod, $bankAccountId, $order->bpartner_id, 'Y', null, 'DEPOSIT', $order->seller,$data['time']);
                //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
                $this->MakePayment->getSavePaymentLine($payment->id, 1, null, $order->id, null, null, null, $paidAmt, 1, 'N');

                $this->MakePayment->completedPayment($payment, 'AR', $paidAmt, 0, 0, $paidAmt);
            }

            $this->Flash->success(__('บันทึกข้อมูลการสั่งซื้อแล้ว'));
            return $this->redirect(['action' => 'view', $order->id]);
        }

        $docNo = $this->DocSequent->getLatest($this->DocumentCode);
        $time = Time::now();
        $time = $time->i18nFormat('HHmm');

        $issales = 'Y';
        $productJsonList = $this->Product->getProductJsonList();

        $this->set(compact('order', 'docNo', 'issales', 'productJsonList', 'time'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $q = $this->Orders->find()
                ->contain(['UserCreated', 'OrderLines' => ['Products', 'Images', 'Bpartners', 'UserModified'], 'Bpartners' => ['Orgs', 'Addresses'], 'Branches' => ['Orgs', 'Addresses']])
                ->where(['Orders.id' => $id])
                ->limit(1);
        $order = $q->first();

        $bpartners = $this->Orders->Bpartners->find('list', ['limit' => 200, 'conditions' => ['iscustomer' => 'N']]);
        $docStatusList = $this->TransactionCode->getOrderStatus();
        $this->set(compact('order', 'docStatusList', 'bpartners', 'docStatusList'));
    }

    public function ajaxSaveOrder() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $postData = $this->request->getData();
            //$this->log($postData,'debug');

            $isordered = 'N';
            foreach ($postData['lines'] as $line) {
                $orderLine = $this->Orders->OrderLines->get($line['order_line_id']);
                $orderLine->bpartner_id = $postData['bpartner_id'];
                $orderLine->order_price = ($line['order_price'] == '' || is_null($line['order_price']) ? 0 : $line['order_price']);
                $orderLine->order_status = 'OM';
                $orderLine->orderdate = new Date();
                $orderLine->modifiedby = $this->Authen->getAuthenUserId();
                $this->Orders->OrderLines->save($orderLine);
                $isordered = 'Y';
            }
            if ($isordered == 'Y') {
                $order = $this->Orders->get($postData['order_id']);
                $order->docstatus = 'OM';
                $order->isordered = $isordered;
                $this->Orders->save($order);
            }
            $this->Flash->success(__('บันทึกข้อมูลการสั่งทำเรียบร้อยแล้ว'));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function showall($dayList = 'Y') {

        $wording = 'รายการสั่งซื้อทั้งหมด';

        $where = ['Orders.docno !=' => '_temp', 'Orders.branch_id' => $this->Core->getLocalBranchId()];
        if ($dayList == 'Y') {
            $todayDate = new Date();
            $wording = 'รายการสั่งซื้อ/สั่งทำประจำวันที่ ' . ($todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE));
            //array_push($where, ['Orders.docdate' => $todayDate]);
        }
        $q = $this->Orders->find()
                ->select(['Orders.id', 'Orders.totalpaid', 'Orders.totalpaid', 'Orders.duedate', 'Orders.docno', 'Orders.isreceived', 'Orders.created', 'Orders.isordered', 'Orders.docstatus'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'order_id'],
                        'Payments' => [
                            'fields' => ['payment_method'],
                            'BankAccounts' => [
                                'fields' => ['account_name']
                            ]],
                    ],
                    'OrderLines' => [
                        'fields' => ['id', 'order_id', 'totalamt'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
                        ],
                        'Bpartners' => [
                            'fields' => ['name']
                        ],
                        'sort' => ['OrderLines.seq' => 'ASC']
                    ],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where($where)
                ->order(['Orders.isreceived' => 'DESC', 'Orders.duedate' => 'ASC']);
        $orders = $q->toArray();
        //$this->log($orders, 'debug');
        $totalAmt = 0;
        $weightAmt = 0;
        foreach ($orders as $order) {
            if ($order->docstatus != 'VO') {
                $totalAmt = $totalAmt + $order->totalpaid;
                foreach ($order->order_lines as $item) {
                    if ($item->has('product')) {
                        if ($item->product->has('weight')) {
                            $weightAmt = $weightAmt + $item->product->weight->value;
                        } else {
                            $weightAmt = $weightAmt + $item->product->manual_weight;
                        }
                    }
                }
            }
        }

        $orderStatus = $this->TransactionCode->getOrderStatus();


        $this->set(compact('orders', 'wording', 'totalAmt', 'weightAmt', 'orderStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $orgs = $this->Orders->Orgs->find('list', ['limit' => 200]);
        $branches = $this->Orders->Branches->find('list', ['limit' => 200]);
        $bpartners = $this->Orders->Bpartners->find('list', ['limit' => 200]);
        $this->set(compact('order', 'orgs', 'branches', 'bpartners'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function void($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id, ['contain' => ['PaymentLines']]);
        $order->docstatus = 'VO';
        //$order_id = $order->id;
        if ($this->Orders->save($order)) {
            $this->Flash->success(__('ยกเลิกรายการสั่งซื้อแล้ว'));

            if (sizeof($order->payment_lines) > 0) {
                foreach ($order->payment_lines as $line) {
                    $this->MakePayment->void($line->payment_id);
                }
                $this->Flash->success(__('ยกเลิกใบเสร็จรับเงินมัดจำแล้ว'));
            }

            return $this->redirect(['action' => 'showall']);
        } else {
            $this->Flash->error(__('ไม่สามารถยกเลิกได้'));
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    public function getdetailjson() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $postData = $this->request->getData();

            $order_id = $postData['order_id'];
            $q = $this->Orders->find()
                    //->select(['Orders.id','Orders.totalamt','Orders.docno','Orders.totalpaid'])
                    ->contain(['OrderLines' => ['Products'], 'Bpartners' => ['Addresses']])
                    ->where(['Orders.id' => $order_id]);
            $orders = $q->toArray();
            if (sizeof($orders) > 0) {

                $orderJson = json_encode($q->first());
                echo $orderJson;
            } else {
                echo 'notfound';
            }
        }
    }

}
