<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdWeights Controller
 *
 * @property \App\Model\Table\SdWeightsTable $SdWeights
 *
 * @method \App\Model\Entity\SdWeight[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdWeightsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdWeights = $this->paginate($this->SdWeights);

        $this->set(compact('sdWeights'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Weight id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdWeight = $this->SdWeights->get($id, [
            'contain' => ['CostLines', 'GoldPriceLines', 'Weights']
        ]);

        $this->set('sdWeight', $sdWeight);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdWeight = $this->SdWeights->newEntity();
        if ($this->request->is('post')) {
            $sdWeight = $this->SdWeights->patchEntity($sdWeight, $this->request->getData());
            if ($this->SdWeights->save($sdWeight)) {
                $this->Flash->success(__('The sd weight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd weight could not be saved. Please, try again.'));
        }
        $this->set(compact('sdWeight'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Weight id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdWeight = $this->SdWeights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdWeight = $this->SdWeights->patchEntity($sdWeight, $this->request->getData());
            if ($this->SdWeights->save($sdWeight)) {
                $this->Flash->success(__('The sd weight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd weight could not be saved. Please, try again.'));
        }
        $this->set(compact('sdWeight'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Weight id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdWeight = $this->SdWeights->get($id);
        if ($this->SdWeights->delete($sdWeight)) {
            $this->Flash->success(__('The sd weight has been deleted.'));
        } else {
            $this->Flash->error(__('The sd weight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
