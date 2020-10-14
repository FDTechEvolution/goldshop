<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * ServicesMovement Controller
 *
 *
 * @method \App\Model\Entity\ServicesMovement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceMovementController extends AppController {
    
    public $GoodsLines = null;
    public $WhProducts = null;
    public $Warehouses = null;
    public $GoodsTransactions = null;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');

        
    }
    
    public function saveMovementLine(){
        $data = [
            'status' => 200,
            'msg' => '',
            'data' => []
        ];
        
        if($this->request->is(['POST','PUT','AJAX'])){
            $this->GoodsLines = TableRegistry::get('GoodsLines');
           
            $postData = $this->request->getData();
            $qtys = $postData['qty'];
            $productIds = $postData['product_id'];
            $goodsTransactionId = $postData['goods_transaction_id'];
            
             //Clear old item
            $this->GoodsLines->deleteAll(['goods_transaction_id' => $goodsTransactionId]);
            
            
            $goodsLines = $this->GoodsLines->find()
                    ->where(['GoodsLines.goods_transaction_id'=>$goodsTransactionId])
                    ->toArray();
            $countNewItem = 0;
            $oldItem = 0;
            foreach ($productIds as $index=>$productId){
                $key = array_search($productId, array_column($goodsLines, 'product_id'));
                if($key == false){
                    $goodsLine = $this->GoodsLines->newEntity();
                    $goodsLine->seq = $index;
                    $goodsLine->product_id = $productId;
                    $goodsLine->qty = $qtys[$index];
                    $goodsLine->goods_transaction_id = $goodsTransactionId;
                    $goodsLine->createdby = $this->Authen->getAuthenUserId();
                    
                    $this->GoodsLines->save($goodsLine);
                    $countNewItem++;
                }else{
                    $oldItem++;
                }
            }
            $data['msg'] = 'saved';
            $data['data']['count_new_item'] = $countNewItem;
            $data['data']['count_old_item'] = $oldItem;
            
            
            
            
        }else{
            $data['msg'] = 'please use POST method.';
        }
        
        $json = json_encode($data);
        $this->set(compact('json'));
    }
    
    
    
    
}
