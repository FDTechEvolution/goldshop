<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * GoodsReceipts Controller
 *
 *
 * @method \App\Model\Entity\GoodsReceipt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoodsReceiptsController extends AppController {

    public $DocumentCodeReceipt = 'GR';

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }

        $this->loadComponent('DocSequent');
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
                ->contain(['ToWarehouse', 'UserCreated','GoodsLines'=>['Products'],'Branches'=>['Orgs','Addresses']])
                ->where(['GoodsTransactions.id'=>$id,'GoodsTransactions.type' => $this->DocumentCodeReceipt]);

        $goodsReceipts = $q->toArray();
        //$this->log($goodsReceipts,'debug');
        if(sizeof($goodsReceipts) ==0){
            return $this->redirect(['action'=>'index']);
        }
        
        $goodsReceipt = $q->first();
        $docStatusList = $this->TransactionCode->getStatusCode();
        $this->set('goodsReceipt', $goodsReceipt);
        $this->set('docStatusList', $docStatusList);
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
                $this->Flash->success(__('บันทึกการนำเข้าสินค้าเรียบร้อย'));

                return $this->redirect(['action' => 'edit', $goodsTransaction->id]);
            }
            $this->log($goodsTransaction->errors(), 'debug');
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }

        $docNo = $this->DocSequent->getLatest($this->DocumentCodeReceipt);
        
        $warehouses = $this->Core->getWarehouseList(['issales'=>'Y']);

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
        $goodsTransaction = $this->GoodsTransactions->get($id,['contain'=>['ToWarehouse','UserCreated']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $postData = $this->request->getData();
            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $postData);

            if ($postData['command'] == 'COMPLETE') {
                $goodsTransaction->status = 'CO';
                $this->completed($goodsTransaction->id);
            }

            $goodsTransaction->modifiedby = $this->Authen->getAuthenUserId();

            $goodsTransaction->docdate = $this->Util->convertDate($postData['docdate']);

            //$this->log($this->request->getData(),'debug');
            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $this->Flash->success(__('บันทึกการนำเข้าสินค้าเรียบร้อย'));

                if ($postData['command'] == 'COMPLETE') {
                    $this->Flash->success(__('นำเข้าเสร็จสมบูรณ์ หากต้องการแก้ไขกรุณาติดต่อผู้ดูแลระบบ'));
                    return $this->redirect(['action' => 'view', $goodsTransaction->id]);
                }
                return $this->redirect(['action' => 'edit', $goodsTransaction->id]);
            }
            $this->Flash->error(__('The goods transaction could not be saved. Please, try again.'));
        }

        $warehouses = $this->Core->getWarehouseList(['ismain'=>'Y']);

        $branches = $this->GoodsTransactions->Branches->find('list', ['limit' => 200]);
        $this->set(compact('goodsTransaction', 'branches', 'docNo', 'warehouses'));
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
        $goodsReceipt = $this->GoodsTransactions->get($id,[
            'contain'=>['GoodsLines']
        ]);
        $goodsReceipt->status = 'VO';
        $goodsReceipt->modifiedby =$this->Authen->getAuthenUserId();
        $this->GoodsTransactions->save($goodsReceipt);
        $this->Flash->success(__('ยกเลิกรายการแล้ว'));
        
        $this->completed($goodsReceipt->id,'VO');
        /*
        if ($this->GoodsReceipts->delete($goodsReceipt)) {
            $this->Flash->success(__('The goods receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The goods receipt could not be deleted. Please, try again.'));
        }
         * 
         */

        return $this->redirect(['action' => 'index']);
    }

    private function completed($goods_receipt_id = null,$status = null) {
        $q = $this->GoodsTransactions->find()
                ->where(['GoodsTransactions.id' => $goods_receipt_id])
                ->contain(['GoodsLines']);
        $goodsReceipt = $q->first();
        $this->log($goodsReceipt, 'debug');
        $warehouse_id = $goodsReceipt->to_warehouse;
        $lines = $goodsReceipt->goods_lines;

        $this->loadModel('WhProducts');
        $_typeNumber = 1;
        if(!is_null($status) && $status =='VO'){
            $_typeNumber = -1;
        }
        foreach ($lines as $line) {
            $q = $this->WhProducts->find()
                    ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.product_id' => $line['product_id']]);
            $whProduct = $q->first();
            $lineQty = $_typeNumber*$line['qty'];
            
            if (is_null($whProduct)) {
                $whProduct = $this->WhProducts->newEntity();
                $whProduct->product_id = $line['product_id'];
                $whProduct->balance_amt = $lineQty;
                $whProduct->warehouse_id = $warehouse_id;
                $whProduct->createdby = $this->Authen->getAuthenUserId();
            } else {
                $qty = $whProduct->balance_amt;
                $totalAmt = $qty+$lineQty;
                $whProduct->balance_amt = $totalAmt;
                $whProduct->modifiedby = $this->Authen->getAuthenUserId();
            }
            $result = $this->WhProducts->save($whProduct);
            if (!$result) {
                $this->log($whProduct->errors(), 'debug');
            }
        }
    }

}
