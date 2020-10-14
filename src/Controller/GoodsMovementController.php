<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Database\Expression\QueryExpression;

/**
 * GoodsMovement Controller
 *
 *
 * @method \App\Model\Entity\GoodsMovement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoodsMovementController extends AppController {

    public $DocumentCodeMovement = 'MM';
    public $GoodsLines = null;
    public $WhProducts = null;
    public $Warehouses = null;
    public $GoodsTransactions = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->loadComponent('DocSequent');
        $this->loadComponent('WarehouseProcess');
        $this->loadModel('Warehouses');
        $this->GoodsTransactions = TableRegistry::get('GoodsTransactions');
        $this->GoodsLines = TableRegistry::get('GoodsLines');
        $this->WhProducts = TableRegistry::get('WhProducts');
        $this->Warehouses = TableRegistry::get('Warehouses');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $q = $this->GoodsTransactions->find()
                ->contain(['FromWarehouse' => ['Branches'], 'ToWarehouse' => ['Branches'], 'UserCreated'])
                ->where(['GoodsTransactions.type' => $this->DocumentCodeMovement])
                ->order(['GoodsTransactions.created' => 'DESC', 'GoodsTransactions.docno' => 'DESC']);
        $goodsReceipts = $q->toArray();
        $docStatusList = $this->TransactionCode->getStatusCode();

        $this->set(compact('goodsReceipts', 'docStatusList'));
    }

    /**
     * View method
     *
     * @param string|null $id Goods Receipt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $isApprove = $this->request->query('approve');

        $isApproveProcess = 'Y';
        if (is_null($isApprove) || $isApprove == '') {
            $isApproveProcess = 'N';
        }

        $goodsReceipt = $this->GoodsTransactions->find()
                ->contain([
                    'FromWarehouse'=>['Branches'=>['Orgs','Addresses']],
                    'UserCreated',
                    'GoodsLines' => ['Products'],
                    ])
                ->where(['GoodsTransactions.id' => $id, 'GoodsTransactions.type' => $this->DocumentCodeMovement])
                ->first();
        //$this->log($id, 'debug');
        if (is_null($goodsReceipt)) {
            return $this->redirect(['action' => 'index']);
        }

        if ($goodsReceipt->status == 'DR') {
            return $this->redirect(['action' => 'edit', $id]);
        }
        
        $toWarehouse = $this->Warehouses->find()
                ->contain(['Branches'=>['Orgs','Addresses']])
                ->where(['Warehouses.id'=>$goodsReceipt->to_warehouse])
                ->first();

        $docStatusList = $this->TransactionCode->getStatusCode();
        
        $this->set(compact('toWarehouse','goodsReceipt','docStatusList','isApproveProcess','toWarehouse'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $goodsTransaction = $this->GoodsTransactions->newEntity();
        if ($this->request->is(['post'])) {
            $postData = $this->request->getData();
            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $postData);

            $goodsTransaction->createdby = $this->Authen->getAuthenUserId();
            $goodsTransaction->type = $this->DocumentCodeMovement;
            $goodsTransaction->status = 'DR';
            $goodsTransaction->branch_id = '0';
            $docNo = $this->DocSequent->getLatestAndSave($this->DocumentCodeMovement);
            $goodsTransaction->docno = $docNo;


            $goodsTransaction->docdate = $this->Util->convertDate($postData['docdate']);

            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $this->Flash->success(__(''));

                return $this->redirect(['action' => 'edit', $goodsTransaction->id]);
            }
            $this->log($goodsTransaction->errors(), 'debug');
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }

        $docNo = $this->DocSequent->getLatest($this->DocumentCodeMovement);
        $warehouses = $this->Core->getWarehouseList([], true);
        $toWarehouses = $warehouses;
        //$toWarehouses['0'] ='นอกระบบ';
        //$warehouseJson = $this->getWHJSON();
        //$branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'docNo', 'warehouses', 'toWarehouses', 'requestType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Goods Receipt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $goodsTransaction = $this->GoodsTransactions->find()
                ->contain(['GoodsLines'=>[
                    'Products'=>['Weights'=>['SdWeights']]
                    ]])
                ->where(['GoodsTransactions.id' => $id])
                ->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $postData = $this->request->getData();
            //$this->log($postData, 'debug');
            //die();
            $command = '';
            if (isset($postData['command'])) {
                $command = $postData['command'];
            }

            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $postData);

            if ($command == 'COMPLETE') {
                $goodsTransaction->status = 'WT';
                //$this->completed($goodsTransaction->id);
            }

            //Clear product
            if (isset($postData['isclearproduct']) && $postData['isclearproduct'] == 'Y') {
                foreach ($goodsTransaction['goods_lines'] as $line) {
                    $this->GoodsLines->delete($line);
                }
            }

            $goodsTransaction->modifiedby = $this->Authen->getAuthenUserId();
            $goodsTransaction->docdate = $this->Util->convertDate($postData['docdate']);

            //$this->log($this->request->getData(),'debug');
            if ($this->GoodsTransactions->save($goodsTransaction)) {

                if ($command == 'COMPLETE') {
                    if (is_null($goodsTransaction->to_warehouse)) {
                        //$this->Flash->success(__('ยืนยันการย้ายสินค้าแล้ว กรุณาแจ้งปลายทางเพื่อรับเข้าสินค้า'));
                        return $this->redirect(['action' => 'approve', $goodsTransaction->id]);
                    } else {
                        $this->Flash->success(__('ยืนยันการย้ายสินค้าแล้ว กรุณาแจ้งปลายทางเพื่อรับเข้าสินค้า'));
                        return $this->redirect(['action' => 'view', $goodsTransaction->id]);
                    }
                } else {
                    $this->Flash->success(__(''));
                    return $this->redirect(['action' => 'edit', $goodsTransaction->id]);
                }
            }
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }

        $warehouses = $this->Core->getWarehouseList([], true);

        //$branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'docNo', 'warehouses'));
    }

    public function approveList() {
        $q = $this->GoodsTransactions->find()
                ->contain(['ToWarehouse', 'UserCreated'])
                ->where(['GoodsTransactions.type' => $this->DocumentCodeMovement, 'GoodsTransactions.status' => 'WT'])
                ->order(['GoodsTransactions.created' => 'DESC', 'GoodsTransactions.docno' => 'DESC']);
        $goodsReceipts = $q->toArray();
        $docStatusList = $this->TransactionCode->getStatusCode();

        $this->set(compact('goodsReceipts', 'docStatusList'));
    }

    public function approve($id = null) {
        $goodsTransaction = $this->GoodsTransactions->get($id);
        $this->completed($goodsTransaction->id);
        $goodsTransaction->status = 'CO';
        $this->GoodsTransactions->save($goodsTransaction);
        $this->Flash->success(__('บันทึกการย้ายสินค้าแล้ว'));
        return $this->redirect(['action' => 'view', $goodsTransaction->id]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Goods Receipt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $goodsReceipt = $this->GoodsReceipts->get($id);
        if ($this->GoodsReceipts->delete($goodsReceipt)) {
            $this->Flash->success(__('The goods receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The goods receipt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function whProduct($warehouse_id = null, $id = mull) {
        $this->viewBuilder()->layout('clean');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //$this->log($data,'debug');

            $goodsLine = $this->GoodsLines->newEntity();
            $goodsLine = $this->GoodsLines->patchEntity($goodsLine, $data);
            $goodsLine->goods_transaction_id = $id;
            $goodsLine->createdby = $this->Authen->getAuthenUserId();
            $goodsLine->seq = $this->getSeq($id);

            $this->GoodsLines->save($goodsLine);

            return $this->redirect(['controller' => 'goods-movement', 'action' => 'wh-product', $warehouse_id, $id]);
        }

        $subquery = $this->GoodsLines->find()
                ->select(['product_id'])
                ->where(function (QueryExpression $exp, Query $q) {
                    return $exp->equalFields('WhProducts.product_id', 'GoodsLines.product_id');
                })
                ->andWhere(['GoodsLines.goods_transaction_id' => $id]);

        $query = $this->Warehouses->WhProducts->find()
                ->contain(['Products' => ['ProductCategories']])
                ->where(function (QueryExpression $exp, Query $q) use ($subquery) {
                    return $exp->notExists($subquery);
                })
                ->andWhere(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.balance_amt > ' => '0']);
        $whProducts = $query->toArray();
        $this->set(compact('whProducts'));
    }

    private function getSeq($goods_trnasaction_id) {
        $q = $this->GoodsLines->find()
                ->where(['GoodsLines.goods_transaction_id' => $goods_trnasaction_id]);
        $seq = $q->count();

        return $seq + 1;
    }

    private function completed($goods_receipt_id = null) {
        $q = $this->GoodsTransactions->find()
                ->where(['GoodsTransactions.id' => $goods_receipt_id])
                ->contain(['GoodsLines']);
        $goodsReceipt = $q->first();
        //$this->log($goodsReceipt, 'debug');
        $warehouse_id = $goodsReceipt->to_warehouse;
        $fromWarehouse_id = $goodsReceipt->from_warehouse;
        $lines = $goodsReceipt->goods_lines;

        //$this->loadModel('WhProducts');

        foreach ($lines as $line) {
            //Update from warehouse
            //updateStock($warehouse_id = null, $product_id = null, $qty = 0, $isPlus = true)
            $this->WarehouseProcess->updateStock($fromWarehouse_id, $line['product_id'], $line['qty'], false);
            $this->Flash->success(__('ปรับลดจำนวนสินค้าต้นทางแล้ว'));

            //Update to warehouse
            $this->WarehouseProcess->updateStock($warehouse_id, $line['product_id'], $line['qty']);
            $this->Flash->success(__('ปรับเพิ่มจำนวนสินค้าปลายทางแล้ว'));
        }
    }

}
