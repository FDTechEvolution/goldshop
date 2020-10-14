<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Date;
/**
 * ProductCategories Controller
 *
 * @property \App\Model\Table\ProductCategoriesTable $ProductCategories
 *
 * @method \App\Model\Entity\ProductCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductCategoriesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        
        $this->loadComponent('Gold');
        $this->loadComponent('Product');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $q = $this->ProductCategories->find('all', [
            'contain' => ['Orgs'],
            'order' => ['ProductCategories.name' => 'ASC']
        ]);
        $productCategories = $q->toArray();
        $productType = $this->TransactionCode->getProductType();

        $this->set(compact('productCategories', 'productType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $productCategory = $this->ProductCategories->newEntity();
        if ($this->request->is('post')) {
            //$this->log($this->request->getData(),'debug');
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            $productCategory->createdby = $this->Authen->getAuthenUserId();
            $productCategory->org_id = $this->Core->getLocalOrgId();

            if ($this->checkDuplicateCode($productCategory->code, $productCategory->org_id)) {
                if ($this->ProductCategories->save($productCategory)) {
                    $this->Flash->success(__('The product category has been saved.'));

                    $this->createJsonData();
                    return $this->redirect(['action' => 'index']);
                }
                $this->log($productCategory->errors(), 'debug');
                $this->Flash->error(__('The product category could not be saved. Please, try again.'));
            } else {
                $this->Flash->error('รหัสนี้ใช้งานซ้ำกับประเภทอื่นไม่ได้ กรุณาระบุรหัสใหม่');
            }
        }
        //Count line
        $q = $this->ProductCategories->find()
                ->where(['ProductCategories.org_id' => $this->Core->getLocalOrgId()]);
        $code = sizeof($q->toArray()) + 1;
        //$orgs = $this->ProductCategories->Orgs->find('list', ['limit' => 200,'conditions'=>['Orgs.id !='=>'0']]);
        $productType = $this->TransactionCode->getProductType('list');
        $unitTypeList = $this->TransactionCode->getUnitType();

        $this->set(compact('productCategory', 'code', 'productType', 'unitTypeList'));
        //$this->set('code',$code);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
            $productCategory->modifiedby = $this->Authen->getAuthenUserId();

            if ($this->checkDuplicateCode($productCategory->code, $productCategory->org_id, $productCategory->id)) {
                if ($this->ProductCategories->save($productCategory)) {
                    $this->Flash->success(__('The product category has been saved.'));

                    $this->createJsonData();
                    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The product category could not be saved. Please, try again.'));
            } else {
                $this->Flash->error('รหัสนี้ใช้งานซ้ำกับประเภทอื่นไม่ได้ กรุณาระบุรหัสใหม่');
            }
        }
        $productType = $this->TransactionCode->getProductType('list');
        $unitTypeList = $this->TransactionCode->getUnitType();

        $this->set(compact('productCategory', 'productType', 'unitTypeList'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $productCategory = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($productCategory)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }

        $this->createJsonData();
        return $this->redirect(['action' => 'index']);
    }

    public function product($product_category_id = null) {
        $this->viewBuilder()->layout('clean');
        $percents = $this->Gold->getGoldPercent();

        $productCategory = $this->ProductCategories->get($product_category_id, [
            'contain' => ['Products' => ['Weights' => ['SdWeights'], 'Designs', 'Sizes']]
        ]);

        $this->set(compact('productCategory', 'percents'));
    }

    private function checkDuplicateCode($code = null, $org_id = null, $id = null) {
        $q = null;

        if (is_null($id) || $id == '') {
            $q = $this->ProductCategories->find()
                    ->where(['ProductCategories.code' => $code, 'ProductCategories.org_id' => $org_id]);
        } else {
            $q = $this->ProductCategories->find()
                    ->where(['ProductCategories.code' => $code, 'ProductCategories.org_id' => $org_id, 'ProductCategories.id !=' => $id]);
        }
        $data = $q->toArray();
        //$this->log(sizeof($data),'debug');

        if (sizeof($data) == 0) {
            return true;
        }

        return false;
    }
    
    private function createJsonData(){
         $this->loadComponent('Json');
         $modelName = 'product_categories';
         $this->Json->deleteFilesByModel($modelName);
         
         $time = Time::now();
         $timeStr = $time->i18nFormat('yyyyMMdd_HHmm');
         $productCategories = $this->ProductCategories->find()->order(['name'=>'ASC'])->toArray();
         $this->Json->write('product_category_'.$timeStr.'.json',$modelName,$productCategories);
         
    }

}
