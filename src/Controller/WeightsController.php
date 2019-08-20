<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Weights Controller
 *
 * @property \App\Model\Table\WeightsTable $Weights
 *
 * @method \App\Model\Entity\Weight[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WeightsController extends AppController {
    
    public $SdWeights = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->viewBuilder()->layout('clean');
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        
        $this->SdWeights = TableRegistry::get('SdWeights');
    }

    /*
      public function index($productCatId = null) {
      $q = $this->Weights->find()
      ->contain(['UserCreated','UserModified'])
      ->where(['Weights.product_category_id'=>$productCatId])
      ->order(['Weights.value'=>'ASC','Weights.created'=>'DESC']);
      $weights = $q->toArray();

      $this->set(compact('weights','productCatId'));
      }
     * 
     */

    public function index() {
        $this->viewBuilder()->layout('default');
        $q = $this->Weights->find()
                ->contain(['UserCreated', 'UserModified','SdWeights'])
                ->order(['Weights.value' => 'ASC', 'Weights.created' => 'DESC']);
        $weights = $q->toArray();
        $this->set(compact('weights'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($productCatId = null) {
        $this->viewBuilder()->layout('default');
        $weight = $this->Weights->newEntity();
        if ($this->request->is('post')) {
            $weight = $this->Weights->patchEntity($weight, $this->request->getData());
            $weight->createdby = $this->Authen->getAuthenUserId();
            if (!$this->isDuplicate($weight)) {
                if ($this->Weights->save($weight)) {
                    $this->Flash->success(__('เพิ่มน้ำหนักทอง "' . $weight->name . '" สำเร็จ'));

                    return $this->redirect(['action' => 'add', $productCatId]);
                }
                $this->Flash->error(__('The weight could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('ชุดน้ำหนักนี้มีอยู่แล้ว (ตรวจสอบชื่อและมาตรฐานของน้ำหนักจะต้องไม่ซ้ำกัน)'));
            }
        }
        $sdWeights = $this->SdWeights->find('list',['order'=>['seq'=>'ASC']]);
        $this->set(compact('weight', 'productCatId', 'sdWeights'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->viewBuilder()->layout('default');
        $weight = $this->Weights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weight = $this->Weights->patchEntity($weight, $this->request->getData());
            $weight->modifiedby = $this->Authen->getAuthenUserId();
            //$weight->name = $weight->value;
            if (!$this->isDuplicate($weight, false)) {
                if ($this->Weights->save($weight)) {
                    $this->Flash->success(__('The weight has been saved.'));

                    return $this->redirect(['action' => 'index', $weight->product_category_id]);
                }
                $this->Flash->error(__('The weight could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('ชุดน้ำหนักนี้มีอยู่แล้ว (ตรวจสอบชื่อและมาตรฐานของน้ำหนักจะต้องไม่ซ้ำกัน)'));
            }
        }
        $sdWeights = $this->SdWeights->find('list',['order'=>['seq'=>'ASC']]);
        $productCategories = $this->Weights->ProductCategories->find('list', ['limit' => 200]);
        $this->set(compact('weight', 'productCategories','sdWeights'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $productCatId = null) {
        $this->request->allowMethod(['post', 'delete']);

        $q = $this->Weights->find()
                ->where(['Weights.id' => $id]);
        if (sizeof($q->toArray()) == 0) {
            $this->Flash->error(__(MSG_DELETE_NOTFOUND));
            return $this->redirect(['action' => 'index', $productCatId]);
        }

        $weight = $q->first();
        if ($this->Weights->delete($weight)) {
            $this->Flash->success(__(MSG_DELETE_SUCCESS));
        } else {
            $this->Flash->error(__(MSG_DELETE_ERROR));
        }

        return $this->redirect(['action' => 'index', $productCatId]);
    }

    private function isDuplicate($weight = null, $isNew = true) {
        $name = $weight->name;
        $sd_weight_id = $weight->sd_weight_id;

        $where = ['Weights.name' => $name];
        if (!$isNew) {
            array_push($where, ['Weights.id !=' => $weight->id]);
        }

        $q = $this->Weights->find()->where($where);
        if (sizeof($q->toArray()) > 0) {
            return true;
        }
        
        $where = ['Weights.sd_weight_id' => $sd_weight_id];
        if (!$isNew) {
            array_push($where, ['Weights.id !=' => $weight->id]);
        }

        $q = $this->Weights->find()->where($where);
        if (sizeof($q->toArray()) > 0) {
            return true;
        }
        
        return false;
    }

}
