<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Branches Controller
 *
 * @property \App\Model\Table\BranchesTable $Branches
 *
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchesController extends AppController {

    public $Addresses = null;
    public $Users = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Addresses = TableRegistry::get('Addresses');
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function index() {
        $this->paginate = [
            'contain' => ['Orgs', 'Addresses'],
            'conditions' => ['Branches.id !=' => '0']
        ];
        $branches = $this->paginate($this->Branches);

        $this->set(compact('branches'));
    }

    /**
     * View method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $branch = $this->Branches->get($id, [
            'contain' => ['Orgs', 'Addresses', 'BankAccounts', 'Bpartners', 'Invoices', 'Orders', 'Payments', 'SavingAccounts', 'SavingTransactions', 'SequentNumbers', 'Users', 'Warehouses']
        ]);

        $this->set('branch', $branch);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $branch = $this->Branches->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $branch = $this->Branches->patchEntity($branch, $data);
            $branch->createdby = $this->Authen->getAuthenUserId();

            ///////////////Add address//////////
            $address = $this->Addresses->newEntity();

            $address = $this->Addresses->patchEntity($address, $data['address']);
            $address->createdby = $this->Authen->getAuthenUserId();
            

            if ($this->Branches->save($branch)) {

                $this->Flash->success(__('บันทึกสาขาแล้ว'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->log($branch->errors(), 'error');
            }
            $this->Flash->error(__('The org could not be saved. Please, try again.'));
            // } else {
            //  $this->Flash->error(__('ไม่สามารถบันทึกที่อยู่ได้'));
            // }
        }
        $orgs = $this->Branches->Orgs->find('list', ['limit' => 200, 'conditions' => ['Orgs.id !=' => '0']]);
        $this->set(compact('branch', 'orgs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $branch = $this->Branches->get($id, [
            'contain' => ['Addresses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $branch = $this->Branches->patchEntity($branch, $data);
            $branch->modifiedby = $this->Authen->getAuthenUserId();

            
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('บันทึกการแก้ไขสาขาเรียบร้อย'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch could not be saved. Please, try again.'));
        }
        $orgs = $this->Branches->Orgs->find('list', ['limit' => 200, 'conditions' => ['Orgs.id !=' => '0']]);
        $addresses = $this->Branches->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('branch', 'orgs', 'addresses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $branch = $this->Branches->get($id);
        $branch->modifiedby = $this->Authen->getAuthenUserId();

        $_count = 0;
        $q = $this->Branches->Warehouses->find()->where(['Warehouses.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->BankAccounts->find()->where(['BankAccounts.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->Bpartners->find()->where(['Bpartners.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->GoodsTransactions->find()->where(['GoodsTransactions.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->Invoices->find()->where(['Invoices.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->Pawns->find()->where(['Pawns.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->Payments->find()->where(['Payments.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->Users->find()->where(['Users.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        $q = $this->Branches->Warehouses->find()->where(['Warehouses.branch_id' => $branch->id]);
        $_count = sizeof($q->toArray()) + $_count;

        //$this->log($_count,'debug');

        if ($_count > 0) {
            $this->Flash->error(__('ไม่สามารถลบได้เนื่องจากมีการใช้งานในธุรกรรมอื่น ๆ'));
            return $this->redirect(['action' => 'index']);
        }
        //die();

        if ($this->Branches->delete($branch)) {
            $address = $this->Branches->Addresses->get($branch->address_id);
            $this->Branches->Addresses->delete($address);
            $this->Flash->success(__('ลบสาขาแล้ว'));
        } else {
            $this->Flash->error(__('The branch could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changeLocalBranch() {
        $this->Users = TableRegistry::get('Users');

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $branch = $this->Branches->get($data['branch_id']);

            $this->request->session()->write('Global.branch_id', $branch->id);
            $this->request->session()->write('Global.branchName', $branch->name);
            $this->Flash->success(__('เปลี่ยนการใช้งานสาขาหลักเป็น "' . $branch->name . '"'));
            return $this->redirect(DEFAULT_HOME_URL);
        }
        $user_id = $this->Authen->getAuthenUserId();
        $user = $this->Users->get($user_id);
        
        $branches = [];
        if ($user->branch_id == '0') {
            $q = $this->Branches->find('list', [
                'conditions' => ['Branches.org_id' => $this->Core->getLocalOrgId(), 'Branches.id !=' => '0']
            ]);
            $branches = $q->toArray();
        }

        $this->set(compact('branches'));
    }

}
