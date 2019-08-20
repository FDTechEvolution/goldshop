<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Date;

/**
 * WhProducts Controller
 *
 * @property \App\Model\Table\WhProductsTable $WhProducts
 *
 * @method \App\Model\Entity\WhProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WhProductsController extends AppController {

    public $Warehouses = null;
    public $Payments = null;
    public $PaymentLines = null;
    public $GoodsLines = null;
    public $GoodsTransactions = null;
    public $Connection = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('clean');
        $this->loadModel('WhProducts');


        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        $this->Warehouses = TableRegistry::get('Warehouses');
        $this->Payments = TableRegistry::get('Payments');
        $this->PaymentLines = TableRegistry::get('PaymentLines');
        $this->GoodsLines = TableRegistry::get('GoodsLines');
        $this->GoodsTransactions = TableRegistry::get('GoodsTransactions');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($warehouse_id = null) {

        //$connection = ConnectionManager::get('default');

        $q = $this->WhProducts->find()
                ->select(['balance_amt'])
                ->contain(['Products' => [
                        'fields' => ['code', 'name', 'unittype', 'manual_weight'],
                        'ProductCategories' => [
                            'fields' => ['name']
                        ],
                        'Weights' => ['fields' => ['value']]
            ]])
                ->where(['WhProducts.warehouse_id' => $warehouse_id]);
        $whProducts = $q->toArray();
        //$this->log($whProducts,'debug');
        //$q = $this->Warehouses
        $this->set(compact('whProducts'));
    }

    public function olditem($warehouse_id = null) {

        $this->loadComponent('WarehouseProcess');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dateforms = $this->request->data['date'];
            $this->log($dateforms, 'debug');
            //die();
            foreach ($dateforms as $dateform) {
                $datest = new Time($dateform);
                $dateed = new Time($dateform);
                $datest->setTime(0, 0, 0);
                $dateed->setTime(24, 0, 0);
                if ($dateform != 0) {

                    $oldItemInfos = $this->WarehouseProcess->getOldItemByDate($warehouse_id, $dateform);
                    $qPL = $this->PaymentLines->find('all')
                            ->contain(['Payments' => ['Warehouses']])
                            ->where(['Payments.warehouse_id' => $warehouse_id, 'PaymentLines.created >' => $datest, 'PaymentLines.created <' => $dateed, 'PaymentLines.isdispose' => 'N']);

                    $PL = $qPL->toArray();
                    if (sizeof($PL) > 0) {
                        foreach ($PL as $PLs) {
                            $PLs['isdispose'] = 'Y';
                            if ($this->PaymentLines->save($PLs)) {
                                $qWH = $this->WhProducts->find('all')
                                        ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.product_id' => $PLs['product_id']])
                                        ->first();
                                $qWH->balance_amt -= 1;
                                if ($this->WhProducts->save($qWH)) {
                                    // $this->Flash->success(__('The WhProducts has been saved.'));
                                } else {
                                    //  $this->Flash->error(__('The WhProducts could not be saved. Please, try again.'));
                                }
                                $this->Flash->success(__('The PaymentLines has been saved.'));
                            } else {
                                $this->Flash->error(__('The PaymentLines could not be saved. Please, try again.'));
                            }
                        }
                    }


                    $qGT = $this->GoodsLines->find('all')
                            ->contain(['GoodsTransactions'])
                            ->where(['GoodsTransactions.to_warehouse' => $warehouse_id, 'GoodsTransactions.created >' => $datest, 'GoodsTransactions.created <' => $dateed, 'GoodsTransactions.isdispose' => 'N']);
                    $GT = $qGT->toArray();

                    if (sizeof($GT) > 0) {
                        foreach ($GT as $GTs) {
                            $GTs['goods_transaction']['isdispose'] = 'Y';
                            $this->GoodsTransactions->save($GTs['goods_transaction']);
                            if ($this->GoodsLines->save($GTs)) {

                                $qWH = $this->WhProducts->find('all')
                                        ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.product_id' => $GTs['product_id']])
                                        ->first();
                                $qWH->balance_amt -= 1;
                                if ($this->WhProducts->save($qWH)) {
                                    
                                } else {
                                    //  $this->Flash->error(__('The WhProducts could not be saved. Please, try again.'));
                                }
                                $this->Flash->success(__('The GoodsTransactions has been saved.'));
                            } else {
                                $this->Flash->error(__('The GoodsTransactions could not be saved. Please, try again.'));
                            }
                        }
                    }
                    //Create goods transaction
                    if (sizeof($oldItemInfos) > 0) {
                        $oldItem = $oldItemInfos[0];
                        $goodsTransaction = $this->GoodsTransactions->newEntity();
                        $goodsTransaction->createdby = $this->Authen->getAuthenUserId();
                        $goodsTransaction->type = 'TO';
                        $goodsTransaction->status = 'CO';
                        $goodsTransaction->branch_id = $this->Core->getLocalBranchId();

                        $goodsTransaction->docno = 'take-out';
                        $todayDate = new Date();
                        $goodsTransaction->docdate = $todayDate;
                        $goodsTransaction->from_warehouse = $warehouse_id;
                        $goodsTransaction->isdispose = 'Y';

                        if ($this->GoodsTransactions->save($goodsTransaction)) {
                            $line = $this->GoodsTransactions->GoodsLines->newEntity();
                            $line->seq = 1;
                            $line->qty = 0;
                            $line->createdby = $this->Authen->getAuthenUserId();
                            $line->goods_transaction_id = $goodsTransaction->id;
                            $des = sprintf('นำจ่าย %s ของวันที่ %s นำหนักรวม %s กรัม', $oldItem['type'], $oldItem['docdate_th'], $oldItem['weight']);
                            $line->description = $des;

                            $this->GoodsTransactions->GoodsLines->save($line);
                        }
                    }
                }
            }
            return $this->redirect(['action' => 'olditem', $warehouse_id]);
        }
        $results = $this->WarehouseProcess->getOldItemByDaily($warehouse_id);


        $this->set(compact('whProducts', 'results'));
    }

    /**
     * View method
     *
     * @param string|null $id Wh Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $whProduct = $this->WhProducts->get($id, [
            'contain' => ['Warehouses', 'Products', 'SerialNumbers']
        ]);

        $this->set('whProduct', $whProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $whProduct = $this->WhProducts->newEntity();
        if ($this->request->is('post')) {
            $whProduct = $this->WhProducts->patchEntity($whProduct, $this->request->getData());
            if ($this->WhProducts->save($whProduct)) {
                $this->Flash->success(__('The wh product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wh product could not be saved. Please, try again.'));
        }
        $warehouses = $this->WhProducts->Warehouses->find('list', ['limit' => 200]);
        $products = $this->WhProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('whProduct', 'warehouses', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wh Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $whProduct = $this->WhProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $whProduct = $this->WhProducts->patchEntity($whProduct, $this->request->getData());
            if ($this->WhProducts->save($whProduct)) {
                $this->Flash->success(__('The wh product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wh product could not be saved. Please, try again.'));
        }
        $warehouses = $this->WhProducts->Warehouses->find('list', ['limit' => 200]);
        $products = $this->WhProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('whProduct', 'warehouses', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wh Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $wid = null) {
        $this->request->allowMethod(['post', 'delete']);
        $whProduct = $this->WhProducts->get($id);
        if ($this->WhProducts->delete($whProduct)) {
            $this->Flash->success(__('The wh product has been deleted.'));
        } else {
            $this->Flash->error(__('The wh product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Warehouses', 'action' => 'view', $wid]);
    }

    public function transaction($warehouse_id = null) {
        $this->Connection = ConnectionManager::get('default');
        $this->loadComponent('ReadSqlFiles');

        $sql = $this->ReadSqlFiles->read('wh_transaction.sql');
        $result = $this->Connection->execute($sql, ['warehouse_id' => $warehouse_id])->fetchAll('assoc');

        $paymentTypes = $this->TransactionCode->getPaymentType();

        $this->set(compact('paymentTypes', 'result'));
    }

}
