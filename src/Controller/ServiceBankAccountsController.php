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
class ServiceBankAccountsController extends AppController {

    public $BankAccounts = null;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
    }
    
    public function getList(){
        $type = $this->request->getQuery('type');
        $where = [];
        
        if(!is_null($type)){
            array_push($where, ['BankAccounts.type'=>$type]);
        }
        $q = $this->BankAccounts->fine()
                ->where($where);
        $bankAccounts = $q->toArray();
        $json = json_encode($bankAccounts);
        
        $this->set(compact('json'));
    }

}
