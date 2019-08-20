<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Designs Controller
 *
 * @property \App\Model\Table\DesignsTable $Designs
 *
 * @method \App\Model\Entity\Design[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DesignsController extends AppController {

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
        $q = $this->Designs->find()
                ->contain(['UserCreated', 'UserModified', 'Images'])
                ->where(['product_category_id' => $productCatId])
                ->order(['Designs.name' => 'ASC', 'Designs.created' => 'DESC']);
        $designs = $q->toArray();

        $this->set(compact('designs', 'productCatId'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($productCatId = null) {
        $design = $this->Designs->newEntity();
        if ($this->request->is('post')) {
            $design = $this->Designs->patchEntity($design, $this->request->getData());
            $design->product_category_id = $productCatId;
            $design->createdby = $this->Authen->getAuthenUserId();
            $img_id = $this->UploadImage->uploadDesign($this->request->getData('img'));
            $design->image_id = $img_id['image_id'];
            //  $this->log($design,'debug');
            if ($this->Designs->save($design)) {
                $this->Flash->success(__('The design has been saved.'));
                return $this->redirect(['action' => 'add', $productCatId]);
            } else {
                $this->log($design->errors(), 'debug');
            }
            $this->Flash->error(__('The design could not be saved. Please, try again.'));
        }

        $this->set(compact('design', 'productCatId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Design id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $design = $this->Designs->get($id, [
            'contain' => ['Images']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $design = $this->Designs->patchEntity($design, $data);
            $design->modifiedby = $this->Authen->getAuthenUserId();

            if ($data['img']['size'] != 0) {
                $img_id = $this->UploadImage->uploadDesign($this->request->getData('img'));
                $design->image_id = $img_id['image_id'];
            }

            if ($this->Designs->save($design)) {
                $this->Flash->success(__('The design has been saved.'));

                return $this->redirect(['action' => 'index', $design->product_category_id]);
            }
            $this->Flash->error(__('The design could not be saved. Please, try again.'));
        }
        $this->set(compact('design'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Design id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $design = $this->Designs->get($id);
        $productCatId = $design->product_category_id;

        if ($this->Designs->delete($design)) {
            $this->Flash->success(__('The design has been deleted.'));
        } else {
            $this->Flash->error(__('The design could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $productCatId]);
    }

}
