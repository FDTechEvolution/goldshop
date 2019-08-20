<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Orgs Controller
 *
 * @property \App\Model\Table\OrgsTable $Orgs
 *
 * @method \App\Model\Entity\Org[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrgsController extends AppController {

    public $Addresses = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Addresses = TableRegistry::get('Addresses');
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function index() {
        $this->paginate = [
            'conditions' => ['Orgs.id !=' => '0']
        ];
        $orgs = $this->paginate($this->Orgs);

        $this->set(compact('orgs'));
    }

    /**
     * View method
     *
     * @param string|null $id Org id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $org = $this->Orgs->get($id, [
            'contain' => ['BankAccounts', 'Bpartners', 'Branchs', 'Images', 'Invoices', 'Products', 'Users', 'Warehouses']
        ]);

        $this->set('org', $org);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $org = $this->Orgs->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $org = $this->Orgs->patchEntity($org, $data);
            $org->createdby =  $this->Authen->getAuthenUserId();




            if ($this->Orgs->save($org)) {

                $this->Flash->success(__('The org has been saved.'));

                return $this->redirect(['action' => 'index']);
            }


            $this->Flash->error(__('The org could not be saved. Please, try again.'));
        }
        $this->set(compact('org'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Org id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $org = $this->Orgs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $org = $this->Orgs->patchEntity($org, $this->request->getData());
            $org->modifiedby = $this->Authen->getAuthenUserId();
            if ($this->Orgs->save($org)) {
                $this->Flash->success(__('The org has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The org could not be saved. Please, try again.'));
        }
        $this->set(compact('org'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Org id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $org = $this->Orgs->get($id);
        $org->modifiedby = $this->Authen->getAuthenUserId();
        $org->isactive='N';
        if ($this->Orgs->save($org)) {
            $this->Flash->success(__('The org has been saved.'));
        } else {
            $this->Flash->error(__('The org could not be saved. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
