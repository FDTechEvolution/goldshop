<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * StorageBins Controller
 *
 * @property \App\Model\Table\StorageBinsTable $StorageBins
 *
 * @method \App\Model\Entity\StorageBin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StorageBinsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('clean');

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null) {
        $warehouse_id = $id;
        
        $q = $this->StorageBins->find()
                ->contain(['UserCreated','UserModified'])
                ->where(['StorageBins.warehouse_id' => $id])
                ->order(['StorageBins.seq'=>'ASC','StorageBins.isdefault'=>'DESC']);
        
        $storageBins = $q->toArray();

        $this->set(compact('storageBins', 'warehouse_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Storage Bin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $storageBin = $this->StorageBins->get($id, [
            'contain' => ['Warehouses', 'Users']
        ]);

        $this->set('storageBin', $storageBin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($warehouse_id = null) {
        $storageBin = $this->StorageBins->newEntity();
        if ($this->request->is('post')) {
            $storageBin = $this->StorageBins->patchEntity($storageBin, $this->request->getData());
            $storageBin->createdby = $this->Authen->getAuthenUserId();
            if ($this->StorageBins->save($storageBin)) {
                $this->Flash->success(__('The storage bin has been saved.'));

                return $this->redirect(['action' => 'index', $warehouse_id]);
            } else {
                $this->log($storageBin->errors(), 'debug');
            }
            $this->Flash->error(__('The storage bin could not be saved. Please, try again.'));
        }
        //$warehouses = $this->StorageBins->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('storageBin', 'warehouse_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Storage Bin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $storageBin = $this->StorageBins->get($id, [
            'contain' => []
        ]);
        $warehouse_id = $storageBin->warehouse_id;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storageBin = $this->StorageBins->patchEntity($storageBin, $this->request->getData());
            $storageBin->modifiedby = $this->Authen->getAuthenUserId();
            if ($this->StorageBins->save($storageBin)) {
                $this->Flash->success(__('The storage bin has been saved.'));

                return $this->redirect(['action' => 'index',$warehouse_id]);
            }
            $this->Flash->error(__('The storage bin could not be saved. Please, try again.'));
        }
        
        //$warehouses = $this->StorageBins->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('storageBin','warehouse_id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Storage Bin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $storageBin = $this->StorageBins->get($id);
        
        $warehouse_id = $storageBin->warehouse_id;
        
        if ($this->StorageBins->delete($storageBin)) {
            $this->Flash->success(__('The storage bin has been deleted.'));
        } else {
            $this->Flash->error(__('The storage bin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$warehouse_id]);
    }

}
