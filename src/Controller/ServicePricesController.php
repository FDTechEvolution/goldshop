<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * ServicePrices Controller
 *
 *
 * @method \App\Model\Entity\ServicePrice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicePricesController extends AppController {
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        
         $this->viewBuilder()->layout('json');

        $this->Connection = ConnectionManager::get('default');
        $this->loadComponent('ReadSqlFiles');
    }
    
    public function gold($issales = 'Y'){
        $data = [];
        
        if($issales =='Y'){
            
        }else{
            
        }
        
        $json = json_encode($data);
        $this->set(compact('json'));
    }
}
