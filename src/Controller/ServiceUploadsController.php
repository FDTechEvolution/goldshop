<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * ServiceUploads Controller
 *
 *
 * @method \App\Model\Entity\ServiceUpload[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceUploadsController extends AppController {
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
    }
    
    public function idCard(){
        
    }
}
