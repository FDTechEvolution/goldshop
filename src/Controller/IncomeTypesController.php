<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * IncomeTypes Controller
 *
 * @property \App\Model\Table\IncomeTypesTable $IncomeTypes
 *
 * @method \App\Model\Entity\IncomeType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IncomeTypesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $q = $this->IncomeTypes->find()
                ->contain(['UserCreated'])
                ->order(['IncomeTypes.isrevenue'=>'DESC','IncomeTypes.name'=>'ASC']);
        $incomeTypes = $q->toArray();

        $this->set(compact('incomeTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Income Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $incomeType = $this->IncomeTypes->get($id, [
            'contain' => ['PaymentLines']
        ]);

        $this->set('incomeType', $incomeType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $incomeType = $this->IncomeTypes->newEntity();
        if ($this->request->is('post')) {
            $incomeType = $this->IncomeTypes->patchEntity($incomeType, $this->request->getData());
            $incomeType->createdby = $this->Authen->getAuthenUserId();
            if ($this->IncomeTypes->save($incomeType)) {
                $this->Flash->success(__('The income type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The income type could not be saved. Please, try again.'));
        }
        $this->set(compact('incomeType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Income Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $incomeType = $this->IncomeTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $incomeType = $this->IncomeTypes->patchEntity($incomeType, $this->request->getData());
            //$incomeType->createdby = $this->Authen->getAuthenUserId();
            if ($this->IncomeTypes->save($incomeType)) {
                $this->Flash->success(__('The income type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The income type could not be saved. Please, try again.'));
        }
        $this->set(compact('incomeType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Income Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $incomeType = $this->IncomeTypes->get($id);
        if ($this->IncomeTypes->delete($incomeType)) {
            $this->Flash->success(__('The income type has been deleted.'));
        } else {
            $this->Flash->error(__('The income type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
