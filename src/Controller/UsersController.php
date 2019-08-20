<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public $Branches = null;
    public $Orgs = null;
    public $Pawns = null;
    public $Invoices = null;
    public $Bpartners = null;
    public $Addresses = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Branches = TableRegistry::get('Branches');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->Pawns = TableRegistry::get('Pawns');
        $this->Invoices = TableRegistry::get('Invoices');
        $this->Bpartners = TableRegistry::get('Bpartners');
        $this->Addresses = TableRegistry::get('Addresses');

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

        $user_branch = $this->request->session()->read('Auth.User.branch_id');
        $where = ['Users.id !=' => '0'];
        if ($user_branch != '0') {
            array_push($where, ['Users.branch_id ' => $user_branch]);
        }
        $q = $this->Users->find()
                ->contain(['Roles', 'Branches'])
                ->where([$where])
                ->order(['Users.firstname' => 'ASC']);

        $users = $q->toArray();
        $this->log($where, 'debug');
        $this->set(compact('users', 'user_branch'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Branches' => ['Orgs', 'Addresses'], 'Roles', 'SystemUsages']
        ]);
        $pawn = $this->Pawns->find('all', [
            'conditions' => ['Pawns.seller ' => $id],
            'contain' => ['Bpartners']
        ]);
        $invoice = $this->Invoices->find('all', [
            'conditions' => ['Invoices.seller ' => $id, 'Invoices.issale' => 'Y'],
            'contain' => []
        ]);
        $docStatusList = $this->TransactionCode->getStatusCode();

        $this->set('user', $user);
        $this->set(compact('pawn', 'docStatusList', 'invoice'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $data);
            $user->birthday = $this->Util->convertDate($data['birthday']);
            $user->startdate = $this->Util->convertDate($data['startdate']);
            $user->org_id = $this->Core->getLocalOrgId();

            $user->createdby = $this->Authen->getAuthenUserId();

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->log($user->errors(), 'debug');
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $branches = $this->Branches->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $user = $this->Users->patchEntity($user, $data);
            $user->birthday = $this->Util->convertDate($data['birthday']);
            $user->startdate = $this->Util->convertDate($data['startdate']);
            $user->org_id = $this->Core->getLocalOrgId();
            $user->modifiedby = $this->Authen->getAuthenUserId();
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $branches = $this->Branches->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->modifiedby = $this->Authen->getAuthenUserId();
        $user->isactive = 'N';
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));
        } else {
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function displaypermission() {
        
    }

}
