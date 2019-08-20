<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * GoodsTransactions Controller
 *
 * @property \App\Model\Table\GoodsTransactionsTable $GoodsTransactions
 *
 * @method \App\Model\Entity\GoodsTransaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoodsTransactionsController extends AppController {

    public $DocumentCodeReceipt = 'GR';

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->loadComponent('DocSequent');
        $this->loadModel('Warehouses');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function receipt($id = null) {
        $goodsTransaction = null;
        $docNo = null;
        $requestType = 'NEW';
        
        if (is_null($id) || $id == '') {
            $goodsTransaction = $this->GoodsTransactions->newEntity();
            $docNo = $this->DocSequent->getLatest($this->DocumentCodeReceipt);
        } else {
            $goodsTransaction = $this->GoodsTransactions->get($id);
            $requestType = 'EDIT';
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $postData = $this->request->getData();
            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $postData);

            if ($postData['command'] == 'COMPLETE') {
                $goodsTransaction->status = 'CO';
            }

            if (is_null($id) || $id == '') {
                $goodsTransaction->createdby = $this->Authen->getAuthenUserId();
                $goodsTransaction->type = $this->DocumentCodeReceipt;
                $goodsTransaction->status = 'DR';
                $goodsTransaction->branch_id = '0';
                $docNo = $this->DocSequent->getLatestAndSave($this->DocumentCodeReceipt);
                $goodsTransaction->docno = $docNo;
            } else {
                $goodsTransaction->modifiedby = $this->Authen->getAuthenUserId();
            }
            
            $goodsTransaction->docdate = $this->Util->convertDate($postData['docdate']);

            //$this->log($this->request->getData(),'debug');
            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $this->Flash->success(__('บันทึกการนำเข้าสินค้าเรียบร้อย'));
                
                if ($postData['command'] == 'COMPLETE') {
                    $this->Flash->success(__('นำเข้าเสร็จสมบูรณ์ หากต้องการแก้ไขกรุณาติดต่อผู้ดูแลระบบ'));
                }
                return $this->redirect(['action' => 'receipt',$goodsTransaction->id]);
            }
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }

        
        $warehouses = $this->Warehouses->find('list');
        $warehouseJson = $this->getWHJSON();

        $branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'branches', 'docNo', 'warehouses', 'warehouseJson','requestType'));
    }

    /**
     * View method
     *
     * @param string|null $id Goods Transaction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $goodsTransaction = $this->GoodsTransactions->get($id, [
            'contain' => ['Branches']
        ]);

        $this->set('goodsTransaction', $goodsTransaction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $goodsTransaction = $this->GoodsTransactions->newEntity();
        if ($this->request->is('post')) {
            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $this->request->getData());
            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $this->Flash->success(__('The goods transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }
        $branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Goods Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $goodsTransaction = $this->GoodsTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $this->request->getData());
            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $this->Flash->success(__('The goods transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }
        $branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'branches'));
    }

    private function getWHJSON() {
        $q = $this->Warehouses->find()
                ->contain(['StorageBins'])
                ->where(['Warehouses.isactive' => 'Y'])
                ->order(['Warehouses.name' => 'ASC']);
        $data = $q->toArray();

        $_temp = [];
        foreach ($data as $value) {
            $_s = [];
            foreach ($value['storage_bins'] as $item) {
                array_push($_s, ['id' => $item['id'], 'name' => $item['name']]);
            }
            $_temp[$value['name']] = $_s;
        }

        return json_encode($_temp);
    }

}
