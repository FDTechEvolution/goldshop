<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * AccountSettings Controller
 *
 * @property \App\Model\Table\AccountSettingsTable $AccountSettings
 *
 * @method \App\Model\Entity\AccountSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountSettingsController extends AppController {

    public $IncomeTypes = null;
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->IncomeTypes = TableRegistry::get('IncomeTypes');
        
        $org_id = $this->Core->getLocalOrgId();
        $q = $this->AccountSettings->find()
                ->where(['AccountSettings.org_id'=>$org_id]);
        if(sizeof($q->toArray())>0){
            $accountSetting = $q->first();
            
            if ($this->request->is(['patch', 'post', 'put'])) {
                $accountSetting = $this->AccountSettings->patchEntity($accountSetting, $this->request->getData());
                
                $this->AccountSettings->save($accountSetting);
                return $this->redirect(['account-settings']);
            }
            
            $expendList = $this->IncomeTypes->find('list',['condition'=>['IncomeTypes.isexpend'=>'Y']]);
            $revenueList = $this->IncomeTypes->find('list',['condition'=>['IncomeTypes.isexpend'=>'N']]);
            $this->set(compact('accountSetting','expendList','revenueList'));
        }else{
            return $this->redirect(['controller'=>'home']);
        }
        
    }

    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $accountSetting = $this->AccountSettings->newEntity();
        if ($this->request->is('post')) {
            $accountSetting = $this->AccountSettings->patchEntity($accountSetting, $this->request->getData());
            if ($this->AccountSettings->save($accountSetting)) {
                $this->Flash->success(__('The account setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account setting could not be saved. Please, try again.'));
        }
        $orgs = $this->AccountSettings->Orgs->find('list', ['limit' => 200]);
        $this->set(compact('accountSetting', 'orgs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Account Setting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $accountSetting = $this->AccountSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountSetting = $this->AccountSettings->patchEntity($accountSetting, $this->request->getData());
            if ($this->AccountSettings->save($accountSetting)) {
                $this->Flash->success(__('The account setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account setting could not be saved. Please, try again.'));
        }
        $orgs = $this->AccountSettings->Orgs->find('list', ['limit' => 200]);
        $this->set(compact('accountSetting', 'orgs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Account Setting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $accountSetting = $this->AccountSettings->get($id);
        if ($this->AccountSettings->delete($accountSetting)) {
            $this->Flash->success(__('The account setting has been deleted.'));
        } else {
            $this->Flash->error(__('The account setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
