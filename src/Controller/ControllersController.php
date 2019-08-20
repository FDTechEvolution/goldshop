<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Controllers Controller
 *
 * @property \App\Model\Table\ControllersTable $Controllers
 *
 * @method \App\Model\Entity\Controller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ControllersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

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
        $q = $this->Controllers->find()
                ->order(['Controllers.value'=>'ASC']);
        
        $controllers = $q->toArray();

        $this->set(compact('controllers'));

//        $conarr = ['actions', 'addresses', 'banks', 'bank_accounts',
//            'bpartners', 'branches', 'controllers', 'images',
//            'invoices', 'invoice_lines', 'orders', 'order_line',
//            'orgs', 'payments', 'payment_lines', 'products',
//            'product_images', 'roles', 'role_accesses', 'saving_accounts',
//            'saving_transactions', 'sequent_nmbers', 'serial_numbers',
//            'system_usages', 'users', 'warehouses', 'wh_products'];
//
//        foreach ($conarr as $data) {
//            $controller = $this->Controllers->newEntity();
//            $controller->name = 'Controller-' . $data;
//            $controller->value = $data;
//            $controller->createdby = 'System';
//            $this->Controllers->save($controller);
//        }
    }

    /**
     * View method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $controller = $this->Controllers->get($id, [
            'contain' => ['Actions']
        ]);

        $this->set('controller', $controller);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $controller = $this->Controllers->newEntity();
        if ($this->request->is('post')) {
            $controller = $this->Controllers->patchEntity($controller, $this->request->getData());
            $controller->createdby = '0';
            if ($this->Controllers->save($controller)) {
                $this->Flash->success(__('The controller has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The controller could not be saved. Please, try again.'));
        }
        $this->set(compact('controller'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $controller = $this->Controllers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controller = $this->Controllers->patchEntity($controller, $this->request->getData());
            $controller->modifiedby = '0';
            if ($this->Controllers->save($controller)) {
                $this->Flash->success(__('The controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controller could not be saved. Please, try again.'));
        }
        $this->set(compact('controller'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $controller = $this->Controllers->get($id);
        if ($this->Controllers->delete($controller)) {
            $this->Flash->success(__('The controller has been deleted.'));
        } else {
            $this->Flash->error(__('The controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
