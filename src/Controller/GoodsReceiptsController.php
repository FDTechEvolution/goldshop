<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * GoodsReceipts Controller
 *
 *
 * @method \App\Model\Entity\GoodsReceipt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoodsReceiptsController extends AppController {

    public $DocumentCodeReceipt = 'GR';
    public $GoodsLines = null;
    public $WhProducts = null;
    public $Bpartners = null;
    public $Orders = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->loadComponent('DocSequent');
        $this->loadComponent('GoodsTransaction');
        $this->loadModel('Warehouses');
        $this->loadModel('GoodsTransactions');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $q = $this->GoodsTransactions->find()
                ->contain(['ToWarehouse', 'UserCreated'])
                ->where(['GoodsTransactions.type' => $this->DocumentCodeReceipt])
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
        $q = $this->GoodsTransactions->find()
                ->contain(['ToWarehouse', 'UserCreated', 'GoodsLines' => ['Products' => [
                            'Weights' => ['SdWeights'], 'Designs', 'Sizes', 'ProductCategories'
                        ]], 'Branches' => ['Orgs', 'Addresses']])
                ->where(['GoodsTransactions.id' => $id, 'GoodsTransactions.type' => $this->DocumentCodeReceipt]);

        $goodsReceipts = $q->toArray();
        //$this->log($goodsReceipts,'debug');
        if (sizeof($goodsReceipts) == 0) {
            return $this->redirect(['action' => 'index']);
        }

        $goodsReceipt = $q->first();
        
        if($goodsReceipt->status == 'DR'){
            return $this->redirect(['action'=>'edit',$id]);
        }
        
        $docStatusList = $this->TransactionCode->getStatusCode();
        $this->set('goodsReceipt', $goodsReceipt);
        $this->set('docStatusList', $docStatusList);
        
        /*
        $this->WhProducts = TableRegistry::get('WhProducts');
        foreach ($goodsReceipt['goods_lines'] as $line){
            $wh = $this->WhProducts->find()
                    ->where(['product_id'=>$line['product_id']])
                    ->first();
            $wh->balance_amt = $wh->balance_amt+$line['qty'];
            $this->WhProducts->save($wh);
        }
         * 
         */
        
        
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
            $goodsTransaction->type = $this->DocumentCodeReceipt;
            $goodsTransaction->status = 'DR';
            $goodsTransaction->branch_id = $this->Core->getLocalBranchId();
            $docNo = $this->DocSequent->getLatestAndSave($this->DocumentCodeReceipt);
            $goodsTransaction->docno = $docNo;


            $goodsTransaction->docdate = $this->Util->convertDate($postData['docdate']);

            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $this->Flash->success(__('สร้างการนำเข้าสินค้า, กรูณาเพิ่มรายการสินค้าให้สมบูรณ์'));

                return $this->redirect(['action' => 'edit', $goodsTransaction->id]);
            }
            $this->log($goodsTransaction->errors(), 'debug');
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }

        $docNo = $this->DocSequent->getLatest($this->DocumentCodeReceipt);

        $warehouses = $this->Core->getWarehouseList(['type' => 'SALES']);

        $branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'branches', 'docNo', 'warehouses', 'requestType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Goods Receipt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $goodsTransaction = $this->GoodsTransactions->get($id, ['contain' => ['ToWarehouse', 'UserCreated']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $postData = $this->request->getData();
            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $postData);

            if (isset($postData['command']) && $postData['command'] == 'COMPLETE') {
                $goodsTransaction->status = 'CO';
                $this->completed($goodsTransaction->id);
            }

            $goodsTransaction->modifiedby = $this->Authen->getAuthenUserId();

            //$goodsTransaction->docdate = $this->Util->convertDate($postData['docdate']);

            //$this->log($this->request->getData(),'debug');
            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $this->Flash->success(__('บันทึกเรียบร้อย'));

                if (isset($postData['command']) && $postData['command'] == 'COMPLETE') {
                    $this->Flash->success(__('นำเข้าเสร็จสมบูรณ์ หากต้องการแก้ไขกรุณาติดต่อผู้ดูแลระบบ'));
                    return $this->redirect(['action' => 'view', $goodsTransaction->id]);
                }
                return $this->redirect(['action' => 'edit', $goodsTransaction->id]);
            }
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }
        $this->Bpartners = TableRegistry::get('Bpartners');
        $bpartners = $this->Bpartners->find('list', ['limit' => 200, 'conditions' => ['iscustomer' => 'N']]);
        //$warehouses = $this->Core->getWarehouseList(['ismain' => 'Y']);

        $branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'branches', 'docNo', 'bpartners'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Goods Receipt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function void($id = null) {

        $this->request->allowMethod(['post', 'delete']);
        $goodsReceipt = $this->GoodsTransactions->get($id, [
            'contain' => ['GoodsLines']
        ]);
        $oldStatus = $goodsReceipt->status;
        
        $goodsReceipt->status = 'VO';
        $goodsReceipt->modifiedby = $this->Authen->getAuthenUserId();
        $this->GoodsTransactions->save($goodsReceipt);
        

        if($oldStatus=='CO'){
            $this->completed($goodsReceipt->id, 'VO');
            $this->Flash->success(__('ยกเลิกรายการแล้ว, ปรับจำนวนสต๊อคในคลังสินค้า'));
        }else{
            $this->Flash->success(__('ยกเลิกรายการแล้ว'));
        }
        

        return $this->redirect(['action' => 'index']);
    }

    private function completed($goods_receipt_id = null, $status = null) {
        $q = $this->GoodsTransactions->find()
                ->where(['GoodsTransactions.id' => $goods_receipt_id])
                ->contain(['GoodsLines']);
        $goodsReceipt = $q->first();
        //$this->log($goodsReceipt, 'debug');
        $warehouse_id = $goodsReceipt->to_warehouse;
        $lines = $goodsReceipt->goods_lines;

        $this->loadModel('WhProducts');
        $_typeNumber = 1;
        if (!is_null($status) && $status == 'VO') {
            $_typeNumber = -1;
        }
        
        
        
        foreach ($lines as $line) {
            $q = $this->WhProducts->find()
                    ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.product_id' => $line['product_id']]);
            $whProduct = $q->first();
            $lineQty = $_typeNumber * $line['qty'];

            if (is_null($whProduct)) {
                $whProduct = $this->WhProducts->newEntity();
                $whProduct->product_id = $line['product_id'];
                $whProduct->balance_amt = $lineQty;
                $whProduct->warehouse_id = $warehouse_id;
                $whProduct->createdby = $this->Authen->getAuthenUserId();
            } else {
                $qty = $whProduct->balance_amt;
                $totalAmt = $qty + $lineQty;
                $whProduct->balance_amt = $totalAmt;
                $whProduct->modifiedby = $this->Authen->getAuthenUserId();
            }
            
            //has order
            if(isset($line['order_id']) && $line['order_id'] !=''){
                $orderId = $line['order_id'];
                //update status
                $this->Orders = TableRegistry::get('Orders');
                $order = $this->Orders->find()->where(['id'=>$orderId])->first();
                if(!(is_null($order))){
                    $order->status = 'RC';
                    $this->Orders->save($order);
                }
            }
            
            
            $result = $this->WhProducts->save($whProduct);
            if (!$result) {
                $this->log($whProduct->errors(), 'debug');
            }
        }
        
        $this->sendLineNotis($goods_receipt_id);
        
    }

    public function saveScanImport($goods_transaction_id = null) {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->GoodsLines = TableRegistry::get('GoodsLines');

            $data = $this->request->getData();
            //$this->log($data,'debug');
            $productIds = $data['product_id'];
            $qtys = $data['qty'];

            foreach ($productIds as $key => $productId) {
                
                $goodsLine = $this->GoodsLines->find()
                        ->where(['GoodsLines.product_id' => $productId, 'GoodsLines.goods_transaction_id' => $goods_transaction_id])
                        ->first();

                if (is_null($goodsLine) || $goodsLine =='') {
                    $goodsLine = $this->GoodsLines->newEntity();
                    $goodsLine->product_id = $productId;
                    $_qty = $qtys[$key];
                    if(is_null($qtys[$key]) || $qtys[$key]==''){
                        $_qty=0;
                    }
                    $goodsLine->qty = $_qty;
                    $goodsLine->goods_transaction_id = $goods_transaction_id;
                    $goodsLine->createdby = $this->Authen->getAuthenUserId();
                    $goodsLine->seq = $this->GoodsTransaction->getLineSeq($goods_transaction_id);
                } else {
                    $goodsLine->qty = ($goodsLine->qty + $qtys[$key]);
                    //$goodsLine->description = $postData['description'];
                }

                if ($this->GoodsLines->save($goodsLine)) {
                   // return true;
                } else {
                    $this->log($goodsLine->errors(), 'debug');
                    //return false;
                }
            }
        }

        return $this->redirect(['controller' => 'goods-receipts', 'action' => 'edit', $goods_transaction_id]);
    }
    
    

    
    /*
     * 
     * Line Notis
     */
    
    private function sendLineNotis($goods_receipt_id){
        $this->loadComponent('LineMessage');
        
        $goodsReceipt = $this->GoodsTransactions->find()
                ->contain(['GoodsLines'=>['Products']])
                ->where(['GoodsTransactions.id' => $goods_receipt_id])
                ->first();
        $lineMsg = '';
        if($goodsReceipt->status == 'VO'){
            $lineMsg = sprintf('ยกเลิกการนำสินค้าเข้าระบบ สาขา%s',$this->Core->getLocalBranchName());
        }else{
            $lineMsg = sprintf('นำสินค้าเข้าระบบ สาขา%s',$this->Core->getLocalBranchName());
        }
        $lineMsg .= chr(10);
        
        $lineMsg .= sprintf('หมายเลขเอกสาร: %s',$goodsReceipt->docno).chr(10);
        $lineMsg .= '------------'.chr(10);
        
        
        //$lineMsg = '';
        $count = 0;
        foreach ($goodsReceipt['goods_lines'] as $line){
            $lineMsg.= sprintf('%s-%s จำนวน.%s',($count++),$line['product']['name'],$line['qty']).chr(10);
        }
 
        $data = array(
            'message' => $lineMsg
        );
        
        $this->LineMessage->sendMsg($data);
    }

}
