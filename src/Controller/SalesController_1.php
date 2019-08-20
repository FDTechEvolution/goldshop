<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

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
    public $Users = null;
    public $Warehouses = null;
    public $BankAccounts = null;
    public $ProductCategories = null;
    public $Orders = null;
    public $Weights = null;
    public $Designs = null;

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

        $this->Invoices = TableRegistry::get('Invoices');
        $this->Payments = TableRegistry::get('Payments');
        $this->Users = TableRegistry::get('Users');
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


        $invoice = $this->Invoices->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$this->log($data, 'debug');
            //die();
            $bpartner_id = null;
            $DOCDATE = $data['docdate'];
            $CUSTOMERTYPE = $data['customer_type'];
            $RECEIPTAMT = $data['receiptamt'];
            $SAVINGAMT = $data['savingamt'];
            $SELLER = $data['seller'];


            if ($CUSTOMERTYPE == 'save') {
                $bpartner_id = $data['bpartner_id'];
            } else {
                $bpartner = $this->Bpartner->getGuestCustomer();
                $bpartner_id = $bpartner->id;
            }

            $order_id = null;
            if (isset($data['order_id']) && $data['order_id'] != null && $data['order_id'] != '') {
                $order_id = $data['order_id'];
            }

            //Invoice
            $invoice = $this->InvoiceProcess->createDraft($DOCDATE, 'Y', $data['payment_method'], $bpartner_id, $SELLER, 'N', $order_id, $data['discountamt']);

            $totalAmount = 0;
            foreach ($data['product'] as $item) {
                $qty = $item['qty'];
                $price = $item['price'];
                $product_id = $item['product_id'];
                $warehouse_id = $item['warehouse_id'];

                $_totalAmount = $this->InvoiceProcess->createInvoiceLine($invoice->id, $product_id, $qty, $price, $warehouse_id);
                $totalAmount = $totalAmount + $_totalAmount;
            }

            //Exchange
            if (isset($data['exchange_product']) && sizeof($data['exchange_product']) > 0) {
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

                    $_totalAmount = $this->InvoiceProcess->createInvoiceLine($invoice->id, $product_id, $qty, $price, $warehouse_id, null, null, null, 'Y');
                    $totalAmount = $totalAmount - $_totalAmount;
                }
            }

            //Order
            $glitems = [];
            if (isset($data['glitems'])) {
                $glitems = $data['glitems'];
            }
            foreach ($glitems as $item) {
                $qty = 1;
                $price = $item['glitem_amount'];
                $glitem_id = $item['glitem_id'];

                $_totalAmount = $this->InvoiceProcess->createInvoiceLine($invoice->id, null, $qty, $price, null, null, $glitem_id);
                $totalAmount = $totalAmount + $_totalAmount;
            }

            //Check has Saving account
            $receiptTotalAmt = $RECEIPTAMT;
            if ($CUSTOMERTYPE == 'save' && $SAVINGAMT > 0) {
               
                //$receiptTotalAmt = $receiptTotalAmt + $SAVINGAMT;
                
                //getSaveTransaction($bpartnerId = null, $bank_account_id = null, $docdate = null,$isDeposit = 'Y', $amount = 0, $description = null)
                $savingTransaction = $this->SavingProcess->getSaveTransaction($bpartner_id,null,$DOCDATE,'N',$SAVINGAMT,'ใช้เงินออมเพื่อซื้อสินค้าหน้าร้าน');
                if($savingTransaction !=null){
                    
                }
            }else{
                $SAVINGAMT = 0;
            }

            $_receiptamt = $receiptTotalAmt;
            if ($totalAmount <= ($receiptTotalAmt+$SAVINGAMT)) {
                $_receiptamt = $totalAmount;
            }
            $invoice = $this->InvoiceProcess->completeInvoice($invoice->id, $totalAmount, $_receiptamt,$SAVINGAMT);

            //has order process
            //Payment
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

            //Make payment with manual receipt
            $payment = $this->PaymentProcess->createDraft($DOCDATE, $data['payment_method'], $bankAccountId, 'Y', 'N', $invoice->org_id, $invoice->branch_id, $invoice->bpartner_id, 'SALES', $invoice->seller);
            $this->PaymentProcess->createPaymentLine($payment->id, $invoice->id);
            $this->PaymentProcess->completePayment($payment->id, $invoice->netamt, 0, $invoice->totalamt, $invoice->totalpaid, $invoice->discount,$SAVINGAMT);

            
            //Update stock
            $this->WarehouseProcess->updateStockByInvoice($invoice->id);

            //Update order
            if (!is_null($invoice->order_id) && $invoice->order_id != '') {
                $order = $this->Orders->get($invoice->order_id);
                $this->OrderProcess->paidAndReceipt($order->id);
            }


            $this->Flash->success(__('The invoice has been saved.'));
            return $this->redirect(['action' => 'view', $invoice->id]);
        }

        $docNo = $this->DocSequent->getLatest($this->DocumentCode);
        // $goldPrices = $this->GoldPrice->getPrice();


        $sellerList = $this->Core->getSellerList();

        $warehouseList = $this->Core->getWarehouseList(['issales' => 'Y']);

        //Get bank account
        $bankAccountList = $this->Core->getBankAccountList('BACC');
        $creditAccountList = $this->Core->getBankAccountList('CREDIT');
        //$this->log($bankAccountList,'debug');
        $issales = 'Y';

        //Get exchange invoice
        $q = $this->Invoices->find()
                ->contain(['InvoiceLines' => ['Products'], 'Bpartners'])
                ->where(['Invoices.isexchange' => 'Y', 'Invoices.branch_id' => $this->Core->getLocalBranchId()])
                ->order(['Invoices.created' => 'DESC']);
        $invoiceExchanges = $q->toArray();

        //Get and complete order
        $q = $this->Orders->find()
                ->contain(['OrderLines' => ['Products'], 'Bpartners'])
                ->where(['Orders.isreceived' => 'N', 'Orders.branch_id' => $this->Core->getLocalBranchId(), 'Orders.docstatus' => 'CO'])
                ->order(['Orders.created' => 'DESC']);
        $orders = $q->toArray();


        //$productType = $this->TransactionCode->getProductType();
        $productCats = $this->ProductCategories->find('list');
        $percents = $this->Gold->getGoldPercent();
        $designs = $this->Designs->find('list', ['group' => 'name', 'order' => 'name ASC']);
        $weights = $this->Weights->find('list', ['group' => 'name', 'order' => 'name ASC']);
        $this->set(compact('productCats', 'percents', 'designs', 'weights'));
        //$productType = $this->TransactionCode->getProductType();

        $this->set(compact('invoice', 'docNo', 'sellerList', 'warehouseList', 'issales', 'invoiceExchanges', 'orders'));
        $this->set('bankAccountList', $bankAccountList);
        $this->set('creditAccountList', $creditAccountList);
    }

    public function showall() {
        $q = $this->Invoices->find()
                ->select(['Invoices.id', 'Invoices.totalamt', 'Invoices.docdate', 'Invoices.docno', 'Invoices.totalpaid'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'invoice_id'],
                        'Payments' => [
                            'fields' => ['payment_method'],
                            'BankAccounts' => [
                                'fields' => ['account_name']
                            ]]
                    ],
                    'InvoiceLines' => [
                        'fields' => ['id', 'invoice_id', 'totalamt', 'isexchange'],
                        'Products' => [
                            'fields' => ['name']
                        ],
                        'InvoiceExchange',
                        'sort' => ['InvoiceLines.seq' => 'ASC']
                    ],
                    'Seller' => [
                        'fields' => ['firstname', 'lastname']
                    ],
                    'Bpartners' => [
                        'fields' => ['name']
                    ]
                ])
                ->where(['Invoices.issale' => 'Y', 'Invoices.isexchange' => 'N'])
                ->order(['Invoices.created' => 'DESC']);
        $invoices = $q->toArray();

        //$this->log($invoices, 'debug');

        $this->set(compact('invoices'));
    }

    public function view($id = null) {
        $q = $this->Invoices->find()
                ->contain(['Orders', 'InvoiceLines' => ['Products', 'Glitems', 'InvoiceExchange'],
                    'PaymentLines' => ['Payments'], 'Seller',
                    'Bpartners' => ['Orgs', 'Addresses' => ['Provinces']],
                    'Branches' => ['Orgs', 'Addresses' => ['Provinces']]])
                ->where(['Invoices.id' => $id]);
        $invoice = $q->first();

        $docStatusList = $this->TransactionCode->getStatusCode();
        $branch = $invoice->branch;
        $bpartner = $invoice->bpartner;
        $this->set(compact('invoice', 'docStatusList','branch','bpartner'));
    }

}
