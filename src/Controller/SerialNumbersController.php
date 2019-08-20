<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * SerialNumbers Controller
 *
 * @property \App\Model\Table\SerialNumbersTable $SerialNumbers
 *
 * @method \App\Model\Entity\SerialNumber[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SerialNumbersController extends AppController
{
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
    public function index()
    {
        $this->paginate = [
            'contain' => ['WhProducts']
        ];
        $serialNumbers = $this->paginate($this->SerialNumbers);

        $this->set(compact('serialNumbers'));
    }

    /**
     * View method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serialNumber = $this->SerialNumbers->get($id, [
            'contain' => ['WhProducts']
        ]);

        $this->set('serialNumber', $serialNumber);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serialNumber = $this->SerialNumbers->newEntity();
        if ($this->request->is('post')) {
            $serialNumber = $this->SerialNumbers->patchEntity($serialNumber, $this->request->getData());
            if ($this->SerialNumbers->save($serialNumber)) {
                $this->Flash->success(__('The serial number has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serial number could not be saved. Please, try again.'));
        }
        $whProducts = $this->SerialNumbers->WhProducts->find('list', ['limit' => 200]);
        $this->set(compact('serialNumber', 'whProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serialNumber = $this->SerialNumbers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serialNumber = $this->SerialNumbers->patchEntity($serialNumber, $this->request->getData());
            if ($this->SerialNumbers->save($serialNumber)) {
                $this->Flash->success(__('The serial number has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serial number could not be saved. Please, try again.'));
        }
        $whProducts = $this->SerialNumbers->WhProducts->find('list', ['limit' => 200]);
        $this->set(compact('serialNumber', 'whProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Serial Number id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serialNumber = $this->SerialNumbers->get($id);
        if ($this->SerialNumbers->delete($serialNumber)) {
            $this->Flash->success(__('The serial number has been deleted.'));
        } else {
            $this->Flash->error(__('The serial number could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
