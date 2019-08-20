<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * ServiceOrders Controller
 *
 *
 * @method \App\Model\Entity\ServiceOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceOrdersController extends AppController {

    public $OrderLines = null;
    public $Orders = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
    }

    public function updateLineStatus() {
        if ($this->request->is('post')) {
            $this->OrderLines = TableRegistry::get('OrderLines');

            $postData = $this->request->getData();
            $this->log($postData, 'debug');
            $status = $postData['status'];
            foreach ($postData['order_lines_id'] as $index => $orderLineId) {
                if (!is_null($orderLineId) && $orderLineId != '') {
                    $orderLine = $this->OrderLines->get($orderLineId);
                    if (!is_null($orderLine)) {
                        $orderLine->order_status = $status;
                        $orderLine->modifiedby = $this->Authen->getAuthenUserId();
                        if($status == 'PD'){
                            $orderLine->order_ispaid = 'Y';
                            $time = Time::now();
                            $orderLine->order_paiddate = $time;
                        }
                        
                        $this->OrderLines->save($orderLine);

                        if ($status == 'RC') {
                            $order = $this->OrderLines->Orders->get($orderLine->order_id);
                            $order->docstatus = 'WT';
                            $this->OrderLines->Orders->save($order);
                        }
                        
                    }
                }
            }
        }
    }

    public function getOrder() {
        $this->Orders = TableRegistry::get('Orders');

        $id = $this->request->getQuery(['id']);
        $bpartnerId = $this->request->getQuery(['bpartner_id']);
        $type = $this->request->getQuery(['type']);
        //$id = $this->request->getQuery(['id']);
        $where = [];
        if (!is_null($bpartnerId)) {
            array_push($where, ['Orders.bpartner_id' => $bpartnerId]);
        }
        if (!is_null($id)) {
            array_push($where, ['Orders.id' => $id]);
        }

        if (!is_null($type)) {
            if ($type == 'sales') {
                array_push($where, ['Orders.docstatus !=' => 'CO']);
            }
        }

        $q = $this->Orders->find()
                ->contain(['OrderLines' => ['Products'], 'Bpartners'])
                ->where($where)
                ->order(['Orders.created' => 'DESC']);
        $orders = $q->toArray();
        $newData = [];
        foreach ($orders as $order) {
            $arr = [];
            $arr['bpartner_id'] = $order->bpartner_id;
            $arr['bpartner_name'] = $order->bpartner->name;
            $arr['branch_id'] = $order->branch_id;
            $arr['docdate'] = $order->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE);
            $arr['docstatus'] = $order->docstatus;
            $arr['id'] = $order->id;
            $arr['duedate'] = $order->duedate->i18nFormat(DATE_FORMATE, null, TH_DATE);
            $arr['totalpaid'] = $order->totalpaid;
            $description = '';
            foreach ($order->order_lines as $line) {
                if ($line->has('product')) {
                    $description = $description . $line->product->name . '  ';
                }
            }
            $arr['description'] = $description;
            $arr['original'] = $order;
            array_push($newData, $arr);
        }


        $json = json_encode($newData);
        $this->set(compact('json'));
    }

}
