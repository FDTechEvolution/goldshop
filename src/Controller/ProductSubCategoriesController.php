<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ProductSubCategories Controller
 *
 * @property \App\Model\Table\ProductSubCategoriesTable $ProductSubCategories
 *
 * @method \App\Model\Entity\ProductSubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductSubCategoriesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('clean');

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function index($productCatId = null) {
        $q = $this->ProductSubCategories->find('all', [
            'contain' => ['ProductCategories', 'Orgs'],
            'conditions' => ['ProductSubCategories.product_category_id' => $productCatId]
        ]);
        $productSubCategories = $q->toArray();

        $this->set(compact('productSubCategories', 'productCatId'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => ['ProductCategories', 'Orgs', 'Products']
        ]);

        $this->set('productSubCategory', $productSubCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($productCatId = null) {
        $productSubCategory = $this->ProductSubCategories->newEntity();
        if ($this->request->is('post')) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            $productSubCategory->createdby = $this->Authen->getAuthenUserId();
            if ($this->checkDuplicateCode($productSubCategory->code, $productSubCategory->product_category_id)) {
                if ($this->ProductSubCategories->save($productSubCategory)) {
                    $this->Flash->success(__('The product sub category has been saved.'));

                    return $this->redirect(['action' => 'index', $productCatId]);
                }
                $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
            } else {
                $this->Flash->error('รหัสนี้ใช้งานซ้ำกับประเภทอื่นไม่ได้ กรุณาระบุรหัสใหม่');
            }
        }
        $productCategories = $this->ProductSubCategories->ProductCategories->find('list', ['limit' => 200]);
        $orgs = $this->ProductSubCategories->Orgs->find('list', ['limit' => 200]);
        $this->set(compact('productSubCategory', 'productCategories', 'orgs', 'productCatId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());

            $productSubCategory->modifiedby = $this->Authen->getAuthenUserId();
            if ($this->checkDuplicateCode($productSubCategory->code, $productSubCategory->product_category_id, $productSubCategory->id)) {
                if ($this->ProductSubCategories->save($productSubCategory)) {
                    $this->Flash->success(__('The product sub category has been saved.'));

                    return $this->redirect(['action' => 'index', $productSubCategory->product_category_id]);
                }
                $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
            } else {
                 $this->Flash->error('รหัสนี้ใช้งานซ้ำกับประเภทอื่นไม่ได้ กรุณาระบุรหัสใหม่');
            }
        }
        $productCategories = $this->ProductSubCategories->ProductCategories->find('list', ['limit' => 200]);
        $orgs = $this->ProductSubCategories->Orgs->find('list', ['limit' => 200]);
        $this->set(compact('productSubCategory', 'productCategories', 'orgs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $productSubCategory = $this->ProductSubCategories->get($id);
        $product_category_id = $productSubCategory->product_category_id;
        if ($this->ProductSubCategories->delete($productSubCategory)) {
            $this->Flash->success(__('The product sub category has been deleted.'));
        } else {
            $this->Flash->error(__('The product sub category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $product_category_id]);
    }

    private function checkDuplicateCode($code = null, $product_category_id = null, $id = null) {
        $q = null;

        if (is_null($id) || $id == '') {
            $q = $this->ProductSubCategories->find()
                    ->where(['ProductSubCategories.code' => $code, 'ProductSubCategories.product_category_id' => $product_category_id]);
        } else {
            $q = $this->ProductSubCategories->find()
                    ->where(['ProductSubCategories.code' => $code, 'ProductSubCategories.product_category_id' => $product_category_id, 'ProductSubCategories.id !=' => $id]);
        }
        $data = $q->toArray();
        //$this->log(sizeof($data),'debug');

        if (sizeof($data) == 0) {
            return true;
        }

        return false;
    }

}
