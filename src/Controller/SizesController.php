<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Sizes Controller
 *
 * @property \App\Model\Table\SizesTable $Sizes
 *
 * @method \App\Model\Entity\Size[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SizesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->viewBuilder()->layout('clean');
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($productCatId = null) {
        $q = $this->Sizes->find()
                ->contain(['UserCreated','UserModified'])
                ->where(['product_category_id'=>$productCatId])
                ->order(['Sizes.name'=>'ASC','Sizes.created'=>'DESC']);
        $sizes = $q->toArray();

        $this->set(compact('sizes','productCatId'));
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($productCatId = null) {
        $size = $this->Sizes->newEntity();
        if ($this->request->is('post')) {
            $size = $this->Sizes->patchEntity($size, $this->request->getData());
            $size->createdby = $this->Authen->getAuthenUserId();
            
            if ($this->Sizes->save($size)) {
                $this->Flash->success(__('The size has been saved.'));

                return $this->redirect(['action' => 'add',$productCatId]);
            }else{
                $this->log($size->errors(),'debug');
            }
            
            $this->Flash->error(__('The size could not be saved. Please, try again.'));
        }
        $this->set(compact('size', 'productCatId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Size id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $size = $this->Sizes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $size = $this->Sizes->patchEntity($size, $this->request->getData());
            $size->modifiedby = $this->Authen->getAuthenUserId();
            
            if ($this->Sizes->save($size)) {
                $this->Flash->success(__('The size has been saved.'));

                return $this->redirect(['action' => 'index',$size->product_category_id]);
            }
            $this->Flash->error(__('The size could not be saved. Please, try again.'));
        }
        $this->set(compact('size'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Size id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$productCatId=null) {
        $this->request->allowMethod(['post', 'delete']);
        $q = $this->Sizes->find()
                ->where(['Sizes.id'=>$id]);
        if(sizeof($q->toArray())==0){
            $this->Flash->error(__(MSG_DELETE_NOTFOUND));
            return $this->redirect(['action' => 'index',$productCatId]);
        }
        
        $size = $q->first();
        
        if ($this->Sizes->delete($size)) {
            $this->Flash->success(MSG_DELETE_SUCCESS);
        } else {
            $this->Flash->error(MSG_DELETE_ERROR);
        }

        return $this->redirect(['action' => 'index',$productCatId]);
    }

}
