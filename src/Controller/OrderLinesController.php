<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderLines Controller
 *
 * @property \App\Model\Table\OrderLinesTable $OrderLines
 *
 * @method \App\Model\Entity\OrderLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderLinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Products', 'SerialNumbers']
        ];
        $orderLines = $this->paginate($this->OrderLines);

        $this->set(compact('orderLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderLine = $this->OrderLines->get($id, [
            'contain' => ['Orders', 'Products', 'SerialNumbers']
        ]);

        $this->set('orderLine', $orderLine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderLine = $this->OrderLines->newEntity();
        if ($this->request->is('post')) {
            $orderLine = $this->OrderLines->patchEntity($orderLine, $this->request->getData());
            if ($this->OrderLines->save($orderLine)) {
                $this->Flash->success(__('The order line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order line could not be saved. Please, try again.'));
        }
        $orders = $this->OrderLines->Orders->find('list', ['limit' => 200]);
        $products = $this->OrderLines->Products->find('list', ['limit' => 200]);
        $serialNumbers = $this->OrderLines->SerialNumbers->find('list', ['limit' => 200]);
        $this->set(compact('orderLine', 'orders', 'products', 'serialNumbers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderLine = $this->OrderLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderLine = $this->OrderLines->patchEntity($orderLine, $this->request->getData());
            if ($this->OrderLines->save($orderLine)) {
                $this->Flash->success(__('The order line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order line could not be saved. Please, try again.'));
        }
        $orders = $this->OrderLines->Orders->find('list', ['limit' => 200]);
        $products = $this->OrderLines->Products->find('list', ['limit' => 200]);
        $serialNumbers = $this->OrderLines->SerialNumbers->find('list', ['limit' => 200]);
        $this->set(compact('orderLine', 'orders', 'products', 'serialNumbers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderLine = $this->OrderLines->get($id);
        if ($this->OrderLines->delete($orderLine)) {
            $this->Flash->success(__('The order line has been deleted.'));
        } else {
            $this->Flash->error(__('The order line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
