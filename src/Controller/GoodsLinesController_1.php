<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * GoodsLines Controller
 *
 * @property \App\Model\Table\GoodsLinesTable $GoodsLines
 *
 * @method \App\Model\Entity\GoodsLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoodsLinesController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->viewBuilder()->layout('clean');
        if ($this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public $WhProducts = null;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($goods_transaction_id = null) {


        $goodsLine = $this->GoodsLines->newEntity();
        $warehouse_id = $this->request->query('warehouse_id');


        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            if (!(is_null($warehouse_id) || $warehouse_id == '')) {
                if (!$this->checkTotalBalance($warehouse_id, $postData['product_id'], $postData['qty'])) {
                    if ($this->saveLine($postData, $goods_transaction_id)) {
                        $this->Flash->success(__('The goods line has been saved.'));

                        return $this->redirect(['action' => 'index', $goods_transaction_id]);
                    }
                }
            }


            $this->Flash->error(__('ไม่สามารถบันทึกได้'));
        }

        $q = $this->GoodsLines->find()
                ->contain(['Products'])
                ->where(['GoodsLines.goods_transaction_id' => $goods_transaction_id])
                ->order(['GoodsLines.seq' => 'ASC']);
        $goodsLines = $q->toArray();

        $products = [];

        if (is_null($warehouse_id) || $warehouse_id == '') {
            $products = $this->GoodsLines->Products->find('list', ['conditions' => ['Products.code !=' => '_temp']]);
        } else {
            $this->WhProducts = TableRegistry::get('WhProducts');
            $q = $this->WhProducts->find()
                    ->contain(['Products'])
                    ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.balance_amt >' => '0']);
            $whProducts = $q->toArray();
            $products = [];
            foreach ($whProducts as $p) {
                $products[$p->product->id] = $p->product->name . ' (คงคลังจำนวน ' . $p->balance_amt . ' ' . $p->product->unittype . ')';
            }
        }


        $this->set(compact('goodsLine', 'products', 'goodsLines'));
    }

    private function checkTotalBalance($warehouse_id = null, $product_id = null, $amount = 0) {
        $q = $this->WhProducts->find()
                ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.product_id' => $product_id]);
        $whProducts = $q->toArray();
        $totalAmt = 0;
        foreach ($whProducts as $p) {
            $totalAmt = $totalAmt + $p->balance_amt;
        }
        if ($amount > $totalAmt) {

            return false;
        }
        return true;
    }

    private function getSeq($goods_trnasaction_id) {
        $q = $this->GoodsLines->find()
                ->where(['GoodsLines.goods_transaction_id' => $goods_trnasaction_id]);
        $seq = $q->count();

        return $seq + 1;
    }

    public function saveLine($postData = null, $goods_transaction_id = null) {
        if (is_null($postData) || is_null($goods_transaction_id) || $goods_transaction_id == '') {
            return false;
        }
        //$this->log($postData,'debug');
        $q = $this->GoodsLines->find()
                ->where(['GoodsLines.product_id' => $postData['product_id'], 'GoodsLines.goods_transaction_id' => $goods_transaction_id]);
        $goodsLine = $q->toArray();

        if (is_null($goodsLine) || sizeof($goodsLine) == 0) {
            $goodsLine = $this->GoodsLines->newEntity();
            $goodsLine = $this->GoodsLines->patchEntity($goodsLine, $postData);
            $goodsLine->goods_transaction_id = $goods_transaction_id;
            $goodsLine->createdby = $this->Authen->getAuthenUserId();
            $goodsLine->seq = $this->getSeq($goods_transaction_id);
        } else {
            $goodsLine = $q->first();
            $goodsLine->qty = ($goodsLine->qty + $postData['qty']);
            $goodsLine->description = $postData['description'];
        }

        if ($this->GoodsLines->save($goodsLine)) {
            return true;
        }
        $this->log($goodsLine->errors(), 'debug');
        return false;
    }

    /**
     * View method
     *
     * @param string|null $id Goods Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $goodsLine = $this->GoodsLines->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('goodsLine', $goodsLine);
    }

    /**
     * Edit method
     *
     * @param string|null $id Goods Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $goodsLine = $this->GoodsLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goodsLine = $this->GoodsLines->patchEntity($goodsLine, $this->request->getData());
            if ($this->GoodsLines->save($goodsLine)) {
                $this->Flash->success(__('The goods line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The goods line could not be saved. Please, try again.'));
        }
        $products = $this->GoodsLines->Products->find('list', ['limit' => 200]);
        $this->set(compact('goodsLine', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Goods Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $goodsLine = $this->GoodsLines->get($id);
        if ($this->GoodsLines->delete($goodsLine)) {
            $this->Flash->success(__('The goods line has been deleted.'));
        } else {
            $this->Flash->error(__('The goods line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
