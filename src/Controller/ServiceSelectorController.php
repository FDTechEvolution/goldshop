<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class ServiceSelectorController extends AppController {

    public $Users = null;
    public $BankAccounts = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
    }

    public function seller() {
        $this->Users = TableRegistry::get('Users');

        $q = $this->Users->find()
                ->select(['id', 'firstname', 'lastname'])
                ->where(['OR' => [['Users.branch_id' => $this->Core->getLocalBranchId()], ['Users.branch_id' => '0']], 'Users.id !=' => '0','role_id'=>'1568c033-3819-46ba-9d4c-6e5132115aa4'])
                ->order(['Users.firstname' => 'ASC']);
        $sellers = $q->toArray();

        $list = [];
        foreach ($sellers as $item) {
            $fullName = $item['firstname'];
            $item['full_name'] = $fullName;
            array_push($list, $item);
        }
        $json = json_encode($list);
        $this->set(compact('json'));
    }
    
    public function bankAccount(){
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $q = $this->BankAccounts->find()
                ->contain(['Banks'])
                ->where([
                    'org_id' => $this->Core->getLocalOrgId(),
                    'OR' => [['branch_id' => '0'], ['branch_id' => $this->Core->getLocalBranchId()]]
                ])
                ->order(['account_name' => 'ASC']);
        $bankAccounts = $q->toArray();

        $list = ['BACC'=>[],'CREDIT'=>[]];
        foreach ($bankAccounts as $item) {
            $name = sprintf('%s %s',($item->has('bank') ? $item->bank->code: '' ),$item->account_name );
            $_arr = [
                'name'=>$name,'id'=>$item->id,'accountno'=>$item->accountno
            ];
            if($item->type == 'BACC'){
                array_push($list['BACC'], $_arr);
            }elseif($item->type == 'CREDIT'){
                array_push($list['CREDIT'], $_arr);
            }
            
        }
        $json = json_encode($list);
        $this->set(compact('json'));
    }

}
