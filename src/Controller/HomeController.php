<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController {

    public $Payments = null;
    public $Pawns = null;
    public $Orders = null;
    public $GoldPrices = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        Date::setToStringFormat('YYYY-MM-dd');

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->Pawns = TableRegistry::get('Pawns');
        $this->Orders = TableRegistry::get('Orders');
        $this->GoldPrices = TableRegistry::get('GoldPrices');
        $this->loadComponent('GoldPrice');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $branchName = $this->request->session()->read('Global.branchName');
        $masterPrice = $this->GoldPrice->getMasterPrice();
        //$toDayPrice = $this->getToDayPrice();
        $orderDues = $this->getOrderDue();
        $pawnDues = $this->getPawnDue();

        $this->set('masterPrice', $masterPrice);
        $this->set(compact('branchName', 'orderDues', 'date', 'pawnDues'));
    }

    private function getToDayPrice() {
        $todayDate = new Date();
        $q = $this->GoldPrices->find()
                ->contain(['GoldPriceLines'=>['SdWeights','sort'=>['SdWeights.seq'=>'ASC']]])
                ->where(['pricedate' => $todayDate,'branch_id'=>$this->Core->getLocalBranchId()])
                ->order(['created' => 'DESC']);
        $goldPrice = $q->first();
        return $goldPrice;
    }

    private function getOrderDue() {
        $orderDues = [];
        //$date = new Date();
        $date = date('Y-m-d', strtotime(' +7 day'));
        $branch_id = $this->Core->getLocalBranchId();
        
        //$this->log($date,'debug');
        
        $q = $this->Orders->find()
                //->select(['duedate'=>'Orders.duedate', 'amount'=>'Orders.totalamt'])
                ->contain(['Bpartners','OrderLines'=>['Products']])
                ->where(['Orders.duedate <=' => $date, 'Orders.branch_id ' => $branch_id,'Orders.docstatus !='=>'VO','Orders.docstatus !='=>'CO'])
                ->order(['Orders.duedate'=>'ASC']);
        $orders = $q->toArray();
        return $orders;
    }
    
    private function getPawnDue(){
        $pawnDues = [];
        $date = new Date();
        $branch_id = $this->Core->getLocalBranchId();
        
        $qpawn = $this->Pawns->find()
                ->contain(['Bpartners'])
                ->where(['Pawns.expiredate <=' => $date, 'Pawns.branch_id ' => $branch_id, 'Pawns.status' => 'CO']);
        $pawns = $qpawn->toArray();

        foreach ($pawns as $item) {
            $_data1 = [];
            $_data1['duedate'] = $item['expiredate'];
            $_data1['amount'] = $item['totalmoney'];
            $_data1['name'] = $item->bpartner->name;
            $_data1['description'] = 'จำนำครบกำหนด';
            array_push($pawnDues, $_data1);
        }
        
        return $pawns;
    }

}
