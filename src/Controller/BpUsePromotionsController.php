<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BpUsePromotions Controller
 *
 * @property \App\Model\Table\BpUsePromotionsTable $BpUsePromotions
 *
 * @method \App\Model\Entity\BpUsePromotion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BpUsePromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bpartners', 'Branches', 'Promotions']
        ];
        $bpUsePromotions = $this->paginate($this->BpUsePromotions);

        $this->set(compact('bpUsePromotions'));
    }

    /**
     * View method
     *
     * @param string|null $id Bp Use Promotion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bpUsePromotion = $this->BpUsePromotions->get($id, [
            'contain' => ['Bpartners', 'Branches', 'Promotions']
        ]);

        $this->set('bpUsePromotion', $bpUsePromotion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bpUsePromotion = $this->BpUsePromotions->newEntity();
        if ($this->request->is('post')) {
            $bpUsePromotion = $this->BpUsePromotions->patchEntity($bpUsePromotion, $this->request->getData());
            if ($this->BpUsePromotions->save($bpUsePromotion)) {
                $this->Flash->success(__('The bp use promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bp use promotion could not be saved. Please, try again.'));
        }
        $bpartners = $this->BpUsePromotions->Bpartners->find('list', ['limit' => 200]);
        $branches = $this->BpUsePromotions->Branches->find('list', ['limit' => 200]);
        $promotions = $this->BpUsePromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('bpUsePromotion', 'bpartners', 'branches', 'promotions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bp Use Promotion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bpUsePromotion = $this->BpUsePromotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bpUsePromotion = $this->BpUsePromotions->patchEntity($bpUsePromotion, $this->request->getData());
            if ($this->BpUsePromotions->save($bpUsePromotion)) {
                $this->Flash->success(__('The bp use promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bp use promotion could not be saved. Please, try again.'));
        }
        $bpartners = $this->BpUsePromotions->Bpartners->find('list', ['limit' => 200]);
        $branches = $this->BpUsePromotions->Branches->find('list', ['limit' => 200]);
        $promotions = $this->BpUsePromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('bpUsePromotion', 'bpartners', 'branches', 'promotions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bp Use Promotion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bpUsePromotion = $this->BpUsePromotions->get($id);
        if ($this->BpUsePromotions->delete($bpUsePromotion)) {
            $this->Flash->success(__('The bp use promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The bp use promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
