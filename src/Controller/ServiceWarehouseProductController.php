<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
/**
 * ServicesWarehouseProduct Controller
 *
 *
 * @method \App\Model\Entity\ServicesWarehouseProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceWarehouseProductController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
    }

    public function productByWarehouse() {
        /*
          $this->loadComponent('JsonData');
          $q = $this->request->getQuery();
          $warehouseId = isset($q['warehouse']) ? $q['warehouse'] : '';
          $data = [];
          if($warehouseId !=''){
          $data = $this->JsonData->getWarehouseProduct($warehouseId);
          }
         * 
         */

        $q = $this->request->getQuery();
        $warehouseId = isset($q['warehouse']) ? $q['warehouse'] : '';
        $data = [];
        if ($warehouseId != '') {

            $this->Connection = ConnectionManager::get('default');
            $this->loadComponent('ReadSqlFiles');
            $sql = $this->ReadSqlFiles->read('wh_product.sql');
            $data = $this->Connection->execute($sql, ['warehouse_id' => $warehouseId])->fetchAll('assoc');
        }



        $json = json_encode($data);
        $this->set(compact('json'));
    }

}
