<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Glitems Controller
 *
 * @property \App\Model\Table\GlitemsTable $Glitems
 *
 * @method \App\Model\Entity\Glitem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GlitemsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $glitems = $this->paginate($this->Glitems);

        $this->set(compact('glitems'));
    }

    /**
     * View method
     *
     * @param string|null $id Glitem id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $glitem = $this->Glitems->get($id, [
            'contain' => ['InvoiceLines']
        ]);

        $this->set('glitem', $glitem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $glitem = $this->Glitems->newEntity();
        if ($this->request->is('post')) {
            $glitem = $this->Glitems->patchEntity($glitem, $this->request->getData());
            if ($this->Glitems->save($glitem)) {
                $this->Flash->success(__('The glitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The glitem could not be saved. Please, try again.'));
        }
        $this->set(compact('glitem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Glitem id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $glitem = $this->Glitems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $glitem = $this->Glitems->patchEntity($glitem, $this->request->getData());
            if ($this->Glitems->save($glitem)) {
                $this->Flash->success(__('The glitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The glitem could not be saved. Please, try again.'));
        }
        $this->set(compact('glitem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Glitem id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $glitem = $this->Glitems->get($id);
        if ($this->Glitems->delete($glitem)) {
            $this->Flash->success(__('The glitem has been deleted.'));
        } else {
            $this->Flash->error(__('The glitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getdetailjson() {
        $this->autoRender = false;
        $data = ['status' => 'notfound'];
        if ($this->request->is('ajax')) {
            $postData = $this->request->getData();

            $code = $postData['code'];
            $q = $this->Glitems->find()
                    ->where(['Glitems.code' => $code]);
            $glitems = $q->toArray();

            if (sizeof($glitems) > 0) {
                $data = $q->first();
                $data['status'] = 'ok';
            }
        }
        $glitemJson = json_encode($data);
        echo $glitemJson;
    }

}
