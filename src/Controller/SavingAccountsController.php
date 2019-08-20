<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * SavingAccounts Controller
 *
 * @property \App\Model\Table\SavingAccountsTable $SavingAccounts
 *
 * @method \App\Model\Entity\SavingAccount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SavingAccountsController extends AppController {

    public $DPCode = 'DP';
    public $WDCode = 'WD';
    public $Branches = null;
    public $Orgs = null;
    public $Products = null;
    public $PawnLines = null;
    public $Bpartners = null;
    public $BankAccounts = null;
    public $SavingTransactions = null;
    public $Users = null;
    public $SystemUsages = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadModel('SavingAccounts');
        $this->loadComponent('DocSequent');
        $this->Branches = TableRegistry::get('Branches');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->PawnLines = TableRegistry::get('PawnLines');
        $this->Bpartners = TableRegistry::get('Bpartners');
        $this->Addresses = TableRegistry::get('Addresses');
        $this->Users = TableRegistry::get('Users');
        $this->SavingTransactions = TableRegistry::get('SavingTransactions');

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $q = $this->SavingAccounts->find()
                ->contain(['Bpartners', 'Branches'])
                //->where(['SavingAccounts.branch_id' => $branch])
                ->order(['SavingAccounts.created' => 'DESC']);

        $savingAccounts = $q->toArray();

        $this->set(compact('savingAccounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Saving Account id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $savingAccount = $this->SavingAccounts->get($id, [
            'contain' => ['Bpartners'=>['Addresses'],'SavingTransactions'=>['BankAccounts' => 'Banks']]
        ]);
        if ($this->request->session()->read('Auth.User.role.name') !== 'admin') {
            $display = 'display: none';
        } else {
            $display = '';
        }
        $sellerList = $this->Core->getSellerList();
       
        $docStatusList = $this->TransactionCode->getStatusCode();

        $this->set(compact('sellerList', 'display','savingAccount','docStatusList'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $savingAccount = $this->SavingAccounts->newEntity();
        if ($this->request->is('post')) {
            $savingAccount = $this->SavingAccounts->patchEntity($savingAccount, $this->request->getData());
            if ($this->SavingAccounts->save($savingAccount)) {
                $this->Flash->success(__('The saving account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saving account could not be saved. Please, try again.'));
        }
        $bpartners = $this->SavingAccounts->Bpartners->find('list', ['limit' => 200]);
        $orgs = $this->SavingAccounts->Orgs->find('list', ['limit' => 200]);
        $branches = $this->SavingAccounts->Branches->find('list', ['limit' => 200]);
        $this->set(compact('savingAccount', 'bpartners', 'orgs', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Saving Account id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $savingAccount = $this->SavingAccounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $savingAccount = $this->SavingAccounts->patchEntity($savingAccount, $this->request->getData());
            if ($this->SavingAccounts->save($savingAccount)) {
                $this->Flash->success(__('The saving account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saving account could not be saved. Please, try again.'));
        }
        $bpartners = $this->SavingAccounts->Bpartners->find('list', ['limit' => 200]);
        $orgs = $this->SavingAccounts->Orgs->find('list', ['limit' => 200]);
        $branches = $this->SavingAccounts->Branches->find('list', ['limit' => 200]);
        $this->set(compact('savingAccount', 'bpartners', 'orgs', 'branches'));
    }

    public function getbank() {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {


            $type = $this->request->data('type');

            echo json_encode($this->Core->getBankAccountList($type));
            die;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Saving Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $savingAccount = $this->SavingAccounts->get($id);
        if ($this->SavingAccounts->delete($savingAccount)) {
            $this->Flash->success(__('The saving account has been deleted.'));
        } else {
            $this->Flash->error(__('The saving account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getsaveaccount() {
        $this->viewBuilder()->layout('ajax');
        $json = [];
        $savingAccount = $this->SavingAccounts->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            //Check duplicate
            $q = $this->SavingAccounts->find()
                    ->where(['bpartner_id' => $data['bpartner_id']]);
            if (sizeof($q->toArray()) == 0) {
                $savingAccount->bpartner_id = $data['bpartner_id'];
                $savingAccount->registerdate = date("Y-m-d");
                $savingAccount->org_id = $this->Core->getLocalOrgId();
                $savingAccount->branch_id = $this->Core->getLocalBranchId();
                $savingAccount->balanceamt = 0;
                $savingAccount->createdby = $this->Authen->getAuthenUserId();

                if ($this->SavingAccounts->save($savingAccount)) {
                    $json =  json_encode($savingAccount);
                } else {
                    $this->log($savingAccount->errors(), 'error');
                    $json =  'ไม่สามารถสร้างบัญชีได้';
                }
            } else {
                $json =  'ไม่สามารถสร้างบัญชีซ้ำกันได้';
            }
        }
       $this->set('json',$json);
    }

    public function ajaxGetSavingAccount() {
        $this->viewBuilder()->layout('ajax');
        //$this->autoRender = false;
        $json = [];
        if ($this->request->is('ajax')) {
            $postData = $this->request->getData();
            $bpartnerId = $postData['bpartner_id'];
            $taxId = $postData['taxid'];

            $q = $this->SavingAccounts->find()
                    ->contain(['Bpartners'])
                    ->where(['SavingAccounts.bpartner_id' => $bpartnerId, 'Bpartners.taxid' => $taxId]);
            if (sizeof($q->toArray()) > 0) {
                $savingAccount = $q->first();
                $json = json_encode($savingAccount);
                //echo $json;
                //die();
            } else {

                $json= 'notfound';
                //die();
            }
        }
        $this->set('json',$json);
    }

    public function ajaxValidationSavingWithCard() {
        $this->viewBuilder()->layout('ajax');
        $this->SystemUsages = TableRegistry::get('SystemUsages');
        $respon = [];

        if ($this->request->is('ajax')) {
            $postData = $this->request->getData();
            $bpartnerId = $postData['bpartner_id'];
            //$taxId = $postData['taxid'];
            $useSavingamt = $postData['usesavingamt'];

            $system_id = $this->request->session()->read('SystemUsages.id');
            $q = $this->SystemUsages->find()
                    ->where(['SystemUsages.id' => $system_id]);
            $system = $q->first();

            $ip = $system->ipaddress;
            $this->loadModel('Smartcards');
            $q = $this->Smartcards->find()->where(['Smartcards.ip' => $ip]);
            $card = $q->first();

            //$card['cardno'] = '1570800042933';
            if (is_null($card) || $card == '') {
                $respon['status'] = '404';
                $respon['msg'] = 'ไม่สามารถดึงข้อมูลได้กรุณาลองใหม่อีกครั้ง';
                //$json = json_encode($respon);
                //echo $json;
            } else {
                $q = $this->Bpartners->find()
                        ->contain(['SavingAccounts'])
                        ->where(['Bpartners.taxid' => $card['cardno']]);
                $bp = $q->first();
                if (!is_null($bp) && $bp->id == $bpartnerId) {
                    $savingAcc = $bp->saving_accounts;
                    $savingAcc = $savingAcc[0];
                    if ($useSavingamt <= $savingAcc['balanceamt']) {
                        $respon['status'] = '200';
                        $respon['msg'] = 'ข้อมูลถูกต้อง';

                        $this->Smartcards->delete($card);
                    } else {
                        $respon['status'] = '500';
                        $respon['msg'] = 'เงินออมของลูกค้ามีไม่เพียงพอ';
                    }
                } else {
                    $respon['status'] = '404';
                    $respon['msg'] = 'ข้อมูลลูกค้าไม่ตรงกัน';
                }
            }
        }
        $json = json_encode($respon);
        //echo $json;
        //die();
        $this->set('json',$json);
    }

}
