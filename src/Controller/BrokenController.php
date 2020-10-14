<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Broken Controller
 *
 *
 * @method \App\Model\Entity\Broken[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrokenController extends AppController {

    public $GoodsTransactions = null;
    public $GoodsLines = null;
    public $Warehouses = null;
    public $DocumentCode = 'BK';

    public function beforeFilter(Event $event) {


        $this->GoodsTransactions = TableRegistry::get('GoodsTransactions');
        $this->GoodsLines = TableRegistry::get('GoodsLines');
        $this->Warehouses = TableRegistry::get('Warehouses');
        $this->loadComponent('InvoiceProcess');
        $this->loadComponent('DocSequent');
        $this->loadComponent('WarehouseProcess');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->viewBuilder()->layout('mobile');
        $isCompleted = true;
        $goodsTransaction = $this->GoodsTransactions->newEntity();

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $warehouse_id = $postData['warehouse_id'];
            $goodsTransaction = $this->GoodsTransactions->patchEntity($goodsTransaction, $postData);

            $goodsTransaction->createdby = $this->Authen->getAuthenUserId();
            $goodsTransaction->type = $this->DocumentCode;
            $goodsTransaction->status = 'DR';
            $goodsTransaction->branch_id = $this->Core->getLocalBranchId();
            $docNo = $this->DocSequent->getLatestAndSave($this->DocumentCode);
            $goodsTransaction->docno = $docNo;
            $goodsTransaction->docdate = $this->Util->convertDate($postData['docdate']);
            $goodsTransaction->from_warehouse = $warehouse_id;

            //Get broken wh
            $q = $this->Warehouses->find()
                    ->where(['ispurchase' => 'Y']);
            $warehouse = $q->first();

            $goodsTransaction->to_warehouse = $warehouse->id;

            if ($this->GoodsTransactions->save($goodsTransaction)) {
                $products = $postData['product'];
                $seq = 1;
                foreach ($products as $product) {
                    $goodsLine = $this->GoodsLines->newEntity();
                    $goodsLine->goods_transaction_id = $goodsTransaction->id;
                    $goodsLine->seq = $seq;
                    $goodsLine->product_id = $product['product_id'];
                    $goodsLine->qty = $product['qty'];
                    $goodsLine->createdby = $this->Authen->getAuthenUserId();
                    if (!$this->GoodsLines->save($goodsLine)) {
                        $isCompleted = false;
                        $this->log($goodsLine->errors(), 'debug');
                    }
                }
            }

            if ($isCompleted) {
                $id = $goodsTransaction->id;
                $q = $this->GoodsTransactions->find()
                        ->contain(['GoodsLines'])
                        ->where(['GoodsTransactions.id' => $id]);
                $goodsTransaction = $q->first();

                // updateStock($warehouse_id = null, $product_id = null, $qty = 0, $isPlus = true)
                $from_warehouse_id = $goodsTransaction->from_warehouse;
                $to_warehouse_id = $goodsTransaction->to_warehouse;
                foreach ($goodsTransaction->goods_lines as $line) {
                    $this->WarehouseProcess->updateStock($from_warehouse_id, $line->product_id, $line->qty, false);
                    $this->WarehouseProcess->updateStock($to_warehouse_id, $line->product_id, $line->qty, true);
                }

                $goodsTransaction->status = 'CO';
                $this->GoodsTransactions->save($goodsTransaction);
                $this->Flash->success(__('บันทึกรายการชำรุดแล้ว'));
                return $this->redirect(['action' => 'view', $goodsTransaction->id]);
            } else {
                $this->Flash->error(__('ไม่สามารถบันทึกได้ กรุณาติดต่อผู้ดูแลระบบ'));
            }
        }

        $sellerList = $this->Core->getSellerList();
        $warehouseList = $this->Core->getWarehouseList(['issales' => 'Y']);
        $docNo = $this->DocSequent->getLatest($this->DocumentCode);

        $this->set(compact('goodsTransaction', 'docNo', 'sellerList', 'warehouseList', 'issales', 'invoiceExchanges', 'orders'));
    }

    public function view($id) {
        $q = $this->GoodsTransactions->find()
                ->contain(['FromWarehouse', 'Seller', 'GoodsLines' => ['Products'], 'ToWarehouse' => ['Branches' => ['Orgs', 'Addresses']]])
                ->where(['GoodsTransactions.id' => $id, 'GoodsTransactions.type' => $this->DocumentCode]);

        $goodsReceipts = $q->toArray();
        //$this->log($goodsReceipts,'debug');
        if (sizeof($goodsReceipts) == 0) {
            return $this->redirect(['action' => 'index']);
        }

        $goodsReceipt = $q->first();
        $docStatusList = $this->TransactionCode->getStatusCode();
        $this->set('goodsReceipt', $goodsReceipt);
        $this->set('docStatusList', $docStatusList);
    }

    public function showall() {
        $todayDate = new Date();
        $q = $this->GoodsTransactions->find()
                ->contain(['ToWarehouse', 'FromWarehouse', 'Seller', 'GoodsLines' => ['Products' => ['Weights']]])
                ->where(['GoodsTransactions.type' => $this->DocumentCode, 'GoodsTransactions.docdate' => $todayDate])
                ->order(['GoodsTransactions.created' => 'DESC', 'GoodsTransactions.docno' => 'DESC']);
        $goodsReceipts = $q->toArray();
        $docStatusList = $this->TransactionCode->getStatusCode();

        $weightAmt = 0;
        $qty = 0;
        foreach ($goodsReceipts as $item) {

            foreach ($item->goods_lines as $line) {
                $qty +=$line->qty;
                if ($line->has('product')) {
                    if ($line->product->has('weight')) {
                        $weightAmt = $weightAmt + $line->product->weight->value;
                    } else {
                        $weightAmt = $weightAmt + $line->product->manual_weight;
                    }
                }
            }
        }

        $this->set(compact('goodsReceipts', 'docStatusList', 'todayDate','weightAmt','qty'));
    }

}
