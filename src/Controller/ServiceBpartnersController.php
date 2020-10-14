<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * ServiceBankAccounts Controller
 *
 *
 * @method \App\Model\Entity\ServiceBankAccount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceBpartnersController extends AppController {

    public $Bpartners = null;

    public function initialize() {
        parent::initialize();
        $this->Bpartners = TableRegistry::get('Bpartners');
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
    }

    public function findByFullname() {
        $data = ['status'=>404,'bpartners'=>[]];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postData = $this->request->getData();
            //$this->log($postData,'debug');
            $firstname = isset($postData['firstname']) ? $postData['firstname'].'%' : ' ';
            $lastname = isset($postData['lastname']) ? $postData['lastname'] : '';

            $bp = $this->Bpartners->find()
                    ->contain(['Addresses'])
                    ->where(['Bpartners.firstname LIKE ' => $firstname, 'Bpartners.lastname LIKE ' => '%'.$lastname.'%'])
                    ->toArray();
            $data['bpartners'] = $bp;
            $data['status'] = 200;
        }

        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->set(compact('json'));
    }
    public function findById() {
        $data = ['status'=>404,'bpartner'=>[]];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postData = $this->request->getData();
            //$this->log($postData,'debug');
            $id = isset($postData['id']) ? $postData['id'] : '';
            

            $bp = $this->Bpartners->find()
                    ->contain(['Addresses'])
                    ->where(['Bpartners.id' => $id])
                    ->first();
            $data['bpartner'] = $bp;
            $data['status'] = 200;
        }

        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->set(compact('json'));
    }

}
