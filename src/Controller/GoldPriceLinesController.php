<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GoldPriceLines Controller
 *
 * @property \App\Model\Table\GoldPriceLinesTable $GoldPriceLines
 *
 * @method \App\Model\Entity\GoldPriceLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoldPriceLinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['GoldPrices']
        ];
        $goldPriceLines = $this->paginate($this->GoldPriceLines);

        $this->set(compact('goldPriceLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Gold Price Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goldPriceLine = $this->GoldPriceLines->get($id, [
            'contain' => ['GoldPrices']
        ]);

        $this->set('goldPriceLine', $goldPriceLine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goldPriceLine = $this->GoldPriceLines->newEntity();
        if ($this->request->is('post')) {
            $goldPriceLine = $this->GoldPriceLines->patchEntity($goldPriceLine, $this->request->getData());
            if ($this->GoldPriceLines->save($goldPriceLine)) {
                $this->Flash->success(__('The gold price line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gold price line could not be saved. Please, try again.'));
        }
        $goldPrices = $this->GoldPriceLines->GoldPrices->find('list', ['limit' => 200]);
        $this->set(compact('goldPriceLine', 'goldPrices'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gold Price Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goldPriceLine = $this->GoldPriceLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goldPriceLine = $this->GoldPriceLines->patchEntity($goldPriceLine, $this->request->getData());
            if ($this->GoldPriceLines->save($goldPriceLine)) {
                $this->Flash->success(__('The gold price line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gold price line could not be saved. Please, try again.'));
        }
        $goldPrices = $this->GoldPriceLines->GoldPrices->find('list', ['limit' => 200]);
        $this->set(compact('goldPriceLine', 'goldPrices'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gold Price Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $goldPriceLine = $this->GoldPriceLines->get($id);
        if ($this->GoldPriceLines->delete($goldPriceLine)) {
            $this->Flash->success(__('The gold price line has been deleted.'));
        } else {
            $this->Flash->error(__('The gold price line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
