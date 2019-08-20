<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Actions Controller
 *
 * @property \App\Model\Table\ActionsTable $Actions
 *
 * @method \App\Model\Entity\Action[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActionsController extends AppController {

    public $Controllers = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Controllers = TableRegistry::get('Controllers');
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
            'contain' => ['Controllers'],
            'limit'=>200,
            
        ];

        $actions = $this->paginate($this->Actions);

        $this->set(compact('actions'));


//        $query = $this->Controllers->find('all');
//        $con = $query->toArray();
//        $page = ['add'];
//        foreach ($con as $data) {
//            foreach ($page as $pagedata) {
//                $action = $this->Actions->newEntity();
//                $action->controller_id=$data['id'];
//                $action->name=$data['value'].'-'.$pagedata;
//                $action->value=$pagedata;
//                $action->createdby='system';
//                $this->Actions->save($action);
//            }
//        }
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $action = $this->Actions->get($id, [
            'contain' => ['Controllers', 'RoleAccesses']
        ]);

        $this->set('action', $action);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $action = $this->Actions->newEntity();
        if ($this->request->is('post')) {
            $action = $this->Actions->patchEntity($action, $this->request->getData());
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $controllers = $this->Actions->Controllers->find('list', ['limit' => 200, 'order' => ['Controllers.name ASC']]);

        $this->set(compact('action', 'controllers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $action = $this->Actions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $action = $this->Actions->patchEntity($action, $this->request->getData());
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $controllers = $this->Actions->Controllers->find('list', ['limit' => 200]);
        $this->set(compact('action', 'controllers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $action = $this->Actions->get($id);
        if ($this->Actions->delete($action)) {
            $this->Flash->success(__('The action has been deleted.'));
        } else {
            $this->Flash->error(__('The action could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
