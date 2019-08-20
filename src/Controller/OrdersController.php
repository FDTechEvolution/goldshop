<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController {

    public $DocumentCode = 'SO'; //Standard Order
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
        $this->loadComponent('OrderProcess');
        $this->loadComponent('PaymentProcess');
        $this->loadComponent('WarehouseProcess');

        $this->Payments = TableRegistry::get('Payments');
        $this->Users = TableRegistry::get('Users');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->Products = TableRegistry::get('Products');

        $this->loadComponent('GoldPrice');
        $this->loadComponent('Gold');
        $this->loadComponent('Product');
    }
    
    public function showall() {
        $todayDate = new Date();
        
        $q = $this->Orders->find()
                ->select(['Orders.id', 'Orders.totalpaid', 'Orders.totalpaid', 'Orders.duedate', 'Orders.docno', 'Orders.isreceived', 'Orders.created', 'Orders.isordered'])
                ->contain([
                    'PaymentLines' => [
                        'fields' => ['payment_id', 'order_id'],
                        'Payments' => [
                            'fields' => ['payment_method'],
                            'BankAccounts' => [
                                'fields' => ['account_name']
                            ]]
                    ],
                    'OrderLines' => [
                        'fields' => ['id', 'order_id', 'totalamt'],
                        'Products' => [
                            'fields' => ['name', 'manual_weight'],
                            'Weights' => [
                                'fields' => ['value']
                            ]
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
                ->where(['Orders.docno !=' => '_temp', 'Orders.branch_id' => $this->Core->getLocalBranchId(), 'Orders.docdate' => $todayDate])
                ->order(['Orders.isreceived' => 'DESC', 'Orders.duedate' => 'ASC']);
        $orders = $q->toArray();
        $this->log($orders, 'debug');
        $totalAmt = 0;
        $weightAmt = 0;
        foreach ($orders as $order) {
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



        $this->set(compact('orders', 'todayDate', 'totalAmt', 'weightAmt'));
    }

}
