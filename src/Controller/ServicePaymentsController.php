<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * ServicePayments Controller
 *
 *
 * @method \App\Model\Entity\ServicePayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicePaymentsController extends AppController {

    public $Connection = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
    }

    public function income() {
        $this->loadComponent('Accounting');
        $newData = [];
        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $startDate = $postData['start_date'];
            $endDate = $postData['end_date'];
            $branchId = $postData['branch_id'];

            $newData = $this->Accounting->journal($startDate, $endDate, $branchId);
        }

        $json = json_encode($newData, JSON_UNESCAPED_UNICODE);
        $this->set(compact('json'));
    }

    

}
