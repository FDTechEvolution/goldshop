<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * ServiceWarehouses Controller
 *
 *
 * @method \App\Model\Entity\ServiceWarehouse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceWarehousesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');

        
        
    }

    public function checkStock() {
        $this->loadComponent('Warehouse');
        $this->loadComponent('CheckStock');
        $this->loadComponent('Product');
        
        $data = [
            'status' => 200,
            'msg' => '',
            'data' => []
        ];

        $q = $this->request->getQuery();
        $productId = isset($q['product']) ? $q['product'] : '';
        $warehouseId = isset($q['warehouse']) ? $q['warehouse'] : '';
        $productCode = isset($q['product_code']) ? $q['product_code'] : '';

        if ($warehouseId != '' && ($productId != '' || $productCode != '')) {
            $result = [];
            if ($productId == '') {
                $result = $this->CheckStock->byProductCode($productCode, $warehouseId);
            } else {
                $result = $this->CheckStock->byProductId($productId, $warehouseId);
            }

            $data['msg'] = $result['msg'];
            $data['data'] = $result;
            $data['product'] = $this->Product->getById($result['product_id']);
        } else {
            $data['status'] = 400;
            $data['msg'] = 'requires id of [product,warehouse].';
        }


        $json = json_encode($data);
        $this->set(compact('json'));
    }

}
