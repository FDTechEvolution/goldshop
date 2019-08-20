<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Warehouses Controller
 *
 * @property \App\Model\Table\WarehousesTable $Warehouses
 *
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WarehousesController extends AppController {

    public $Branches = null;
    public $Orgs = null;
    public $Products = null;
    public $WhProducts = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Branches = TableRegistry::get('Branches');
        $this->Orgs = TableRegistry::get('Orgs');
        $this->Products = TableRegistry::get('Products');
        $this->WhProducts = TableRegistry::get('WhProducts');
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function index() {

        $branch_id = $this->Core->getLocalBranchId();
        $where = ['Warehouses.org_id'=>$this->Core->getLocalOrgId()];
        $isMultipleBranch = $this->Core->isMultipleBranch();

        if ($branch_id != '0' && $isMultipleBranch==false) {
            array_push($where, ['Warehouses.branch_id' => $branch_id]);
        }
        $q = $this->Warehouses->find()
                ->contain(['Orgs', 'Branches', 'WhProducts'])
                ->where($where)
                ->order(['Branches.name' => 'ASC']);

        $warehouses = $q->toArray();
        //$this->log($warehouses,'debug');
        $this->set(compact('warehouses'));
    }

    /**
     * View method
     *
     * @param string|null $id Warehouse id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $whProduct = $this->WhProducts->newEntity();
        $warehouse = $this->Warehouses->get($id, [
            'contain' => ['Orgs', 'Branches', 'WhProducts' => ['Products']]
        ]);

        $products = $this->WhProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('warehouse', $warehouse, 'products', $products, 'whProduct'));
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $whProduct = $this->WhProducts->patchEntity($whProduct, $data);
            $whProduct->createdby = $this->Authen->getAuthenUserId();
            if ($this->WhProducts->save($whProduct)) {
                $this->Flash->success(__('The wh product has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The wh product could not be saved. Please, try again.'));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $warehouse = $this->Warehouses->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $warehouse = $this->Warehouses->patchEntity($warehouse, $data);

            $queryBranch = $this->Branches->get($data['branch_id'], [
                'contain' => []
            ]);
            $branch = $queryBranch->toArray();
            $warehouse->org_id = $branch['org_id'];
            $warehouse->createdby = $this->Authen->getAuthenUserId();
            $warehouse->isactive = 'Y';
            if ($this->Warehouses->save($warehouse)) {
                $this->Flash->success(__('The warehouse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The warehouse could not be saved. Please, try again.'));
        }
        $orgs = $this->Warehouses->Orgs->find('list', ['limit' => 200]);
        $branches = $this->Warehouses->Branches->find('list', ['limit' => 200]);
        //debug($branches);
        $this->set(compact('warehouse', 'orgs', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Warehouse id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $warehouse = $this->Warehouses->get($id, [
            'contain' => []
        ]);
        if($warehouse->islock=='Y'){
            $this->Flash->error(__('ไม่อนุญาตให้แก้ไข'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $warehouse = $this->Warehouses->patchEntity($warehouse, $data);
            $queryBranch = $this->Branches->get($data['branch_id'], [
                'contain' => []
            ]);
            $branch = $queryBranch->toArray();
            $warehouse->org_id = $branch['org_id'];

            if ($this->Warehouses->save($warehouse)) {
                $this->Flash->success(__('The warehouse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The warehouse could not be saved. Please, try again.'));
        }
        $orgs = $this->Warehouses->Orgs->find('list', ['limit' => 200]);
        $branches = $this->Warehouses->Branches->find('list', ['limit' => 200]);
        $this->set(compact('warehouse', 'orgs', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Warehouse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $warehouse = $this->Warehouses->get($id);
        
        $_count = 0;
        $q = $this->Warehouses->InvoiceLines->find()->where(['InvoiceLines.warehouse_id'=>$warehouse->id]);
        $_count = sizeof($q->toArray())+$_count;
        
        $q = $this->Warehouses->WhProducts->find()->where(['WhProducts.warehouse_id'=>$warehouse->id]);
        $_count = sizeof($q->toArray())+$_count;
        
        
        if($_count > 0){
            $this->Flash->error(__('ไม่สามารถลบได้เนื่องจากมีการใช้งานในธุรกรรมอื่น ๆ'));
            return $this->redirect(['action' => 'index']);
        }

        
        if ($this->Warehouses->delete($warehouse)) {
            $this->Flash->success(__('The warehouse has been deleted.'));
        } else {
            $this->Flash->error(__('The warehouse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
