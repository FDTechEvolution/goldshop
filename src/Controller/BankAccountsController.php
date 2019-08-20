<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * BankAccounts Controller
 *
 * @property \App\Model\Table\BankAccountsTable $BankAccounts
 *
 * @method \App\Model\Entity\BankAccount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BankAccountsController extends AppController {

    public $Payments = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        $this->Payments = TableRegistry::get('Payments');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Banks', 'Orgs', 'Branches']
        ];
        $q = $this->BankAccounts->find()
                ->contain(['Banks', 'Orgs', 'Branches'])
                ->where(['BankAccounts.org_id' => $this->Core->getLocalOrgId()])
                ->order(['BankAccounts.type' => 'DESC', 'BankAccounts.account_name' => 'ASC', 'BankAccounts.accountno' => 'ASC']);
        $bankAccounts = $q->toArray();

        $this->set(compact('bankAccounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank Account id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $bankAccount = $this->BankAccounts->get($id, [
            'contain' => ['Banks', 'Orgs', 'Branches']
        ]);

        $q = $this->Payments->find()
                ->contain(['Seller'])
                ->where(['Payments.bank_account_id' => $id,'Payments.docstatus'=>'CO'])
                ->order(['Payments.paymentdate' => 'DESC']);
        $payments = $q->toArray();

        $paymentTypes = $this->TransactionCode->getPaymentType();

        $this->set(compact('bankAccount', 'paymentTypes', 'payments'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $bankAccount = $this->BankAccounts->newEntity();
        if ($this->request->is('post')) {
            $isDuplicate = false;
            $msg = '';
            
            $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());

            $bankAccount->createdby = $this->Authen->getAuthenUserId();
            $bankAccount->org_id = $this->Core->getLocalOrgId();

            if ($bankAccount->type == 'CASH') {
                $bankAccount->accountno = null;
                $bankAccount->account_type = null;
                $bankAccount->bank_id = null;
                
                $q = $this->BankAccounts->find()
                        ->where(['BankAccounts.type'=>'CASH','BankAccounts.branch_id'=>$bankAccount->branch_id]);
                if(sizeof($q->toArray()) >0){
                    $isDuplicate = true;
                    $msg = 'มีบัญชีเงินสดอยู่แล้ว, ใน 1 สาขาสามารถมีได้เพียง 1 บัญชีเท่านั้น';
                }
            }elseif($bankAccount->type == 'BACC'){
                $q = $this->BankAccounts->find()
                        ->where(['BankAccounts.type'=>'BACC',
                            'BankAccounts.branch_id'=>$bankAccount->branch_id,
                            'BankAccounts.accountno'=>$bankAccount->accountno]);
                if(sizeof($q->toArray()) >0){
                    $isDuplicate = true;
                    $msg = 'ไม่สามารถบันทึกหมายเลขบัญชีซ้ำกันได้';
                }
            }
            
            if ($isDuplicate == false) {
                if ($this->BankAccounts->save($bankAccount)) {
                    $this->Flash->success(__('The bank account has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->log('[BANKS-ACCOUNT][ADD]', 'debug');
                    $this->log($bankAccount->errors(), 'debug');
                }
                $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
            }else{
                $this->Flash->error($msg);
            }
        }
        $banks = $this->BankAccounts->Banks->find('list', ['limit' => 200]);
        //$orgs = $this->BankAccounts->Orgs->find('list', ['limit' => 200]);
        $branches = $this->BankAccounts->Branches->find('list', ['limit' => 200]);
        $bankAccountTypes = $this->TransactionCode->getBankAccountType();
        $types = $this->TransactionCode->getBankTypes('list');

        $this->set(compact('bankAccount', 'banks', 'orgs', 'branches', 'bankAccountTypes', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bank Account id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $bankAccount = $this->BankAccounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());

            $bankAccount->modifiedby = $this->Authen->getAuthenUserId();
            if ($this->BankAccounts->save($bankAccount)) {
                $this->Flash->success(__('The bank account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
        }
        $banks = $this->BankAccounts->Banks->find('list', ['limit' => 200]);
        $orgs = $this->BankAccounts->Orgs->find('list', ['limit' => 200]);
        $branches = $this->BankAccounts->Branches->find('list', ['limit' => 200]);
        $bankAccountTypes = $this->TransactionCode->getBankAccountType();
        $types = $this->TransactionCode->getBankTypes('list');
        $this->set(compact('bankAccount', 'banks', 'orgs', 'branches', 'bankAccountTypes', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bank Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $bankAccount = $this->BankAccounts->get($id);
        if ($this->BankAccounts->delete($bankAccount)) {
            $this->Flash->success(__('The bank account has been deleted.'));
        } else {
            $this->Flash->error(__('The bank account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
