<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Smartcards Controller
 *
 * @property \App\Model\Table\SmartcardsTable $Smartcards
 *
 * @method \App\Model\Entity\Smartcard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmartcardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $smartcards = $this->paginate($this->Smartcards);

        $this->set(compact('smartcards'));
    }

    /**
     * View method
     *
     * @param string|null $id Smartcard id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $smartcard = $this->Smartcards->get($id, [
            'contain' => []
        ]);

        $this->set('smartcard', $smartcard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $smartcard = $this->Smartcards->newEntity();
        if ($this->request->is('post')) {
            $smartcard = $this->Smartcards->patchEntity($smartcard, $this->request->getData());
            if ($this->Smartcards->save($smartcard)) {
                $this->Flash->success(__('The smartcard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smartcard could not be saved. Please, try again.'));
        }
        $this->set(compact('smartcard'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Smartcard id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $smartcard = $this->Smartcards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smartcard = $this->Smartcards->patchEntity($smartcard, $this->request->getData());
            if ($this->Smartcards->save($smartcard)) {
                $this->Flash->success(__('The smartcard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smartcard could not be saved. Please, try again.'));
        }
        $this->set(compact('smartcard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Smartcard id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $smartcard = $this->Smartcards->get($id);
        if ($this->Smartcards->delete($smartcard)) {
            $this->Flash->success(__('The smartcard has been deleted.'));
        } else {
            $this->Flash->error(__('The smartcard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
