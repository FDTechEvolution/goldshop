<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * SavingTransactions Controller
 *
 * @property \App\Model\Table\SavingTransactionsTable $SavingTransactions
 *
 * @method \App\Model\Entity\SavingTransaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SavingTransactionsController extends AppController {

    public $DPCode = 'DP';
    public $WDCode = 'WD';
    public $Branches = null;
    public $Orgs = null;
    public $SavingAccounts = null;
    public $Bpartners = null;
    public $BankAccounts = null;
    public $IncomeTypes = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadModel('SavingTransactions');
        $this->loadComponent('DocSequent');
        $this->loadComponent('MakePayment');
        $this->loadComponent('IncomeProcess');
        $this->Branches = TableRegistry::get('Branches');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->SavingAccounts = TableRegistry::get('SavingAccounts');
        $this->Bpartners = TableRegistry::get('Bpartners');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $this->IncomeTypes = TableRegistry::get('IncomeTypes');

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
        $this->paginate = [
            'contain' => ['Orgs', 'Branches', 'BankAccounts']
        ];
        $savingTransactions = $this->paginate($this->SavingTransactions);

        $this->set(compact('savingTransactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Saving Transaction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $q = $this->SavingTransactions->find()
                ->contain(['Orgs', 'Branches', 'BankAccounts' => 'Banks'])
                ->where(['saving_account_id' => $id])
                ->order(['SavingTransactions.created' => 'ASC']);
        $savingTransaction = $q->toArray();

        $savingAccount = $this->SavingAccounts->get($id, [
            'contain' => ['Bpartners', 'Orgs', 'Branches']
        ]);
        $docStatusList = $this->TransactionCode->getStatusCode();
        $this->set('savingTransaction', $savingTransaction, 'savingAccount', $savingAccount);
        $this->set(compact('savingAccount', 'docStatusList'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->autoRender = false;
        $savingTransaction = $this->SavingTransactions->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$this->log($data,'debug');
            $savingAccount = $this->SavingAccounts->get($data['saving_account_id']);
            $bankAccountId = isset($data['bank_account_id'])?$data['bank_account_id']:null;
            $paymentMethod = $data['btype'];
            $savingTransaction = $this->SavingTransactions->patchEntity($savingTransaction, $data);
            $savingTransaction->org_id = $this->Core->getLocalOrgId();
            $savingTransaction->branch_id = $this->Core->getLocalBranchId();
            $savingTransaction->bank_account_id = $bankAccountId;
            $savingTransaction->createdby = $this->Authen->getAuthenUserId();
            $savingTransaction->docdate = $this->Util->convertDate($data['docdate']);
            $savingTransaction->docstatus = 'CO';
           
            if ($data['func'] == 'withdraw') {

                $savingTransaction->docno = $this->DocSequent->getLatestAndSave($this->WDCode);
                $savingTransaction->isdeposit = 'N';

                $savingTransaction->amount += $data['fee'];
                $savingTransaction->description = 'หักค่าธรรมเนียม ' . $data['fee'] . ' บาท ';
                if ($savingAccount->balanceamt >= $data['amount']) {
                    $savingAccount->balanceamt -= ($data['amount'] + $data['fee']);
                    $this->SavingAccounts->save($savingAccount);
                }
                $incometype = $this->IncomeTypes->find()
                        ->where(['name' => 'ค่าธรรมเนียมเงินออม']
                        )->first();
                
                $this->makepayment($bankAccountId, $data['docdate'], $paymentMethod, $savingAccount->bpartner_id, $data['saving_account_id'], $data['amount'], 'N', $savingTransaction->seller);
                $this->IncomeProcess->getSaveRevenue($data['docdate'], $paymentMethod, $incometype->id, $data['bank_account'], $data['seller'], $data['fee']);
            } else {
                $savingTransaction->docno = $this->DocSequent->getLatestAndSave($this->DPCode);
                $savingTransaction->isdeposit = 'Y';
                $savingAccount->balanceamt += $data['amount'];
                $this->SavingAccounts->save($savingAccount);
                $savingTransaction->description = '-';
                $this->makepayment($bankAccountId, $data['docdate'], $paymentMethod, $savingAccount->bpartner_id, $data['saving_account_id'], $data['amount'], 'Y', $savingTransaction->seller);
            }

            if ($this->SavingTransactions->save($savingTransaction)) {

                $this->Flash->success(__('The saving transaction has been saved.'));
            } else {
                $this->Flash->error(__('The saving transaction could not be saved. Please, try again.'));
                $this->log($savingTransaction->errors(), 'error');
            }
            
        }
        return $this->redirect(['controller' => 'saving-accounts', 'action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Saving Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $savingTransaction = $this->SavingTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $savingTransaction = $this->SavingTransactions->patchEntity($savingTransaction, $this->request->getData());
            if ($this->SavingTransactions->save($savingTransaction)) {
                $this->Flash->success(__('The saving transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saving transaction could not be saved. Please, try again.'));
        }
        $orgs = $this->SavingTransactions->Orgs->find('list', ['limit' => 200]);
        $branches = $this->SavingTransactions->Branches->find('list', ['limit' => 200]);
        $bankAccounts = $this->SavingTransactions->BankAccounts->find('list', ['limit' => 200]);
        $this->set(compact('savingTransaction', 'orgs', 'branches', 'bankAccounts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Saving Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function void($id = null) {
        //   $this->request->allowMethod(['post', 'delete']);
        $this->autoRender = false;
        if ($this->request->is(['patch', 'post', 'put', 'GET'])) {
            // $this->log($id, 'debug');
            $savingTransaction = $this->SavingTransactions->get($id);
            if ($savingTransaction->isdeposit == 'Y') {
                $savingTransaction->docstatus = 'VO';
            } else {
                $savingTransaction->docstatus = 'VO';
            }
            if ($this->SavingTransactions->save($savingTransaction)) {
                $this->Flash->success(__('ยกเลิกรายการนี้แล้ว'));
                return $this->redirect(['controller' => 'saving-accounts', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Please, try again.'));
            }
        }
    }

    public function listsavingtransaction() {
        $todayDate = new Date();

        $datest = new Time();
        $dateed = new Time();
        $datest->setTime(0, 0, 0);
        $dateed->setTime(24, 0, 0);

        $branchId = $this->Core->getLocalBranchId();
        $data = $this->SavingTransactions->find('all', [
            'contain' => ['Seller', 'Orgs', 'Branches', 'SavingAccounts' => ['Bpartners']],
            'conditions' => ['SavingTransactions.branch_id' => $branchId, 'SavingTransactions.created >' => $datest, 'SavingTransactions.created <' => $dateed],
            'order' => ['SavingTransactions.created asc']
        ]);

        $dataArr = $data->toArray();

        $sumDep = 0;
        $sumWit = 0;
        $countDep = 0;
        $countWit = 0;
        foreach ($dataArr as $datas) {
            if ($datas->isdeposit == "Y") {
                $countDep++;
                $sumDep += $datas->amount;
            } else {
                $countWit++;
                $sumWit += $datas->amount;
            }
        }
        $this->set(compact('dataArr', 'sumDep', 'sumWit', 'countDep', 'countWit', 'todayDate'));
    }

    private function makepayment($bankAccountId = null, $docdate = null, $payment_method = null, $bp_id = null, $saving_id = null, $amt = null, $isreceipt = 'Y', $seller = null) {

        //Payment
        //getSaveDraft($paymentDate = null,$paymentMethod = null, $bankAccountId = null, $bpartnerId = null, $isReceipt = 'Y',$warehouseId = null, $type = null,$seller= null)
        $payment = $this->MakePayment->getSaveDraft($docdate, $payment_method, $bankAccountId, $bp_id, $isreceipt, null, 'SAVING', $seller);
        //Payment Line
        //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
        $this->MakePayment->getSavePaymentLine($payment->id, 1, null, null, null, $saving_id, null, $amt, 1);
        //completedPayment($payment = null,$documentCode = null,$amount =0,$discount = 0,$usesavingamt = 0,$totalAmount = 0)
        $this->MakePayment->completedPayment($payment, ($isreceipt == 'Y' ? 'AR' : 'AP'), $amt, 0, 0, $amt);
    }

}
