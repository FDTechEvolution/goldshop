<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController {

    public $WhProducts = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        $this->loadComponent('Gold');
        $this->loadComponent('GoldPrice');
        $this->loadComponent('Product');
        $this->WhProducts = TableRegistry::get('WhProducts');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {

        $q = $this->Products->find()
                ->contain(['Orgs', 'ProductCategories', 'UserCreated', 'Weights','Images'])
                ->where(['Products.code !=' => '_temp'])
                ->order(['Products.name' => 'ASC', 'Products.created' => 'DESC']);
        $products = $q->toArray();

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $product = $this->Products->get($id, [
            'contain' => ['Orgs', 'ProductImages', 'WhProducts']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $product = $this->Products->patchEntity($product, $data);
            $product->createdby = $this->Authen->getAuthenUserId();
            $product->org_id = $this->Core->getLocalOrgId();
            $product->code = $this->Product->generateProductCode($product->product_category_id);
            $product->isactive = 'Y';
            if($data['isservice'] =='Y'){
                $product->size_id = null;
                $product->weight_id = null;
                $product->design_id = null;
                $product->percent = null;
                $product->image_id = null;
                $product->cost = 0;
            }
            $img_id = $this->UploadImage->uploadproductimage($this->request->getData('img'));
            $product->image_id = $img_id['image_id'];

            if ($this->checkDuplicate($product)) {
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('บันทึก "' . $product->name . '" เป็นสินค้าใหม่แล้ว'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->log($product->errors(), 'debug');
                    $this->log($img_id, 'debug');
                }
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('สินค้านี้มีอยู่แล้ว'));
            }
        }

        //$productCatJson = $this->getProductCatJSON();
        $percents = $this->Gold->getGoldPercent();
        $unitTypeList = $this->TransactionCode->getUnitType();
        $productType = $this->TransactionCode->getProductType();
        $productCats = $this->Products->ProductCategories->find('list');
        $weights = $this->Product->getWeightList();
        $orgs = $this->Products->Orgs->find('list', ['limit' => 200]);
        $this->set(compact('product', 'orgs', 'unitTypeList', 'productType', 'productCats', 'percents', 'weights'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data  = $this->request->getData();
            $this->log($data,'debug');
            $product = $this->Products->patchEntity($product, $data);
            $product->modifiedby = $this->Authen->getAuthenUserId();
            
            if($data['isservice'] =='Y'){
                $product->size_id = null;
                $product->weight_id = null;
                $product->design_id = null;
                $product->percent = null;
                $product->image_id = null;
                $product->cost = 0;
            }
            
            if (!is_null($data['img']) && $data['img']!='') {
                $img_id = $this->UploadImage->uploadDesign($this->request->getData('img'));
                $product->image_id = $img_id['image_id'];
            }
            if ($this->Products->save($product)) {
                $this->Flash->success(__('บันทึกการแก้ไข "' . $product->name . '" แล้ว'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        //$productCatJson = $this->getProductCatJSON();
        $percents = $this->Gold->getGoldPercent();
        $unitTypeList = $this->TransactionCode->getUnitType();
        $productType = $this->TransactionCode->getProductType();
        $productCats = $this->Products->ProductCategories->find('list');
         $weights = $this->Product->getWeightList();
        $orgs = $this->Products->Orgs->find('list', ['limit' => 200]);
        $this->set(compact('product', 'orgs', 'unitTypeList', 'productType', 'productCats', 'percents','weights'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        
        $isDelete = true;
        //Check warehouse
        $q = $this->Products->WhProducts->find()
                ->where(['product_id'=>$id]);
        if(sizeof($q->toArray()) >0){
             $this->Flash->error(__('ไม่สามารถลบได้ มีการใช้สินค้านี้อยู่'));
           return $this->redirect(['action' => 'edit',$id]);
        }
        
        
        
        
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getproductoptionjson($product_category_id = null) {
        //$this->log($product_category_id,'debug');
        //$this->autoRender = false;
        $this->viewBuilder()->layout('ajax');
        $_temp = [
            'designs' => [], 'sizes' => [], 'weights' => []
        ];

        if (is_null($product_category_id) || $product_category_id == '') {
            $jsonData = json_encode($_temp);
            echo $jsonData;
        }

        $q = $this->Products->ProductCategories->find()
                ->contain(['Designs', 'Sizes', 'Weights'])
                ->where(['ProductCategories.id' => $product_category_id])
                ->order(['ProductCategories.name' => 'ASC']);
        $data = $q->first();
        

        if (is_null($data) || $data == '') {
            $jsonData = json_encode($_temp);
            echo $jsonData;
        }

        $_designs = [];
        foreach ($data['designs'] as $value) {
            array_push($_designs, ['id' => $value['id'], 'name' => $value['name']]);
        }

        $_sizes = [];
        foreach ($data['sizes'] as $value) {
            array_push($_sizes, ['id' => $value['id'], 'name' => $value['name']]);
        }

        $_weights = [];
        foreach ($data['weights'] as $value) {
            array_push($_weights, ['id' => $value['id'], 'name' => $value['name']]);
        }

        $_temp['designs'] = $_designs;
        $_temp['sizes'] = $_sizes;
        $_temp['weights'] = $_weights;
        $_temp['unittype'] = $data['unittype'];
        $_temp['isservice'] = $data['type']=='S'?'Y':'N';

       
        $jsonData = json_encode($_temp);
        
       //  $this->log($jsonData,'debug');
        echo $jsonData;
        die();
    }

    /*
      private function getProductCatJSON() {
      $q = $this->Products->ProductCategories->find()
      ->contain(['Designs', 'Sizes', 'Weights'])
      ->where(['ProductCategories.isactive' => 'Y'])
      ->order(['ProductCategories.name' => 'ASC']);
      $data = $q->toArray();

      $_temp = [];
      foreach ($data as $value) {
      $_s = [];
      foreach ($value['product_sub_categories'] as $item) {
      array_push($_s, ['id' => $item['id'], 'name' => $item['name']]);
      }
      $_temp[$value['name']] = $_s;
      }

      return json_encode($_temp);
      }
     * 
     */

    private function checkDuplicate($data = null, $product_id = null) {
        if (is_null($data)) {
            return true;
        }


        $count = 0;
        if (is_null($product_id) || $product_id == '') {
            $q = $this->Products->find()
                    ->where([
                //'product_category_id' => $data->product_category_id,
                //'type' => $data->type,
                //'size_id' => $data->size_id,
                'name' => $data->name,
                //'weight_id' => $data->weight_id,
                //'design_id' => $data->design_id,
                'org_id' => $data->org_id
            ]);
            //$this->log($q,'debug');
            //$this->log($q->toArray(),'debug');
            ///$this->log($this->Products->find()->toArray(),'debug');
            $count = $q->count();
        } else {
            $q = $this->Products->find()
                    ->where([
                'product_category_id' => $data->product_category_id,
                'type' => $data->type,
                'size_id' => $data->size_id,
                'name' => $data->name,
                'weight_id' => $data->weight_id,
                'design_id' => $data->design_id,
                'org_id' => $data->org_id,
                'id !=' => $product_id
            ]);
            $count = $q->count();
        }


        if ($count > 0) {
            return false;
        }
        return true;
    }

    //For barcode scaner
    public function getdetailjson() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $postData = $this->request->getData();
            
            $code = $postData['code'];
            $warehouse_id = $postData['warehouse_id'];
            $qty = $postData['qty'];
            if(is_null($qty) || strtolower($qty) =='nan' || $qty == ''){
                $qty = 1;
            }
            $qty = intval($qty);
            
            
            $q = $this->Products->find()
                    ->select(['id', 'name', 'code', 'actual_price', 'unittype'])
                     ->contain(['ProductCategories'=>[
                         'fields'=>['isstock']
                     ]])
                    ->where(['Products.code' => $code])
                    ->limit(1);
            $product = $q->first();
            //$this->log($product,'debug');
            if (is_null($product) || $product == '') {
                echo 'notfound';
            } else {
                //Check stock
                $q = $this->WhProducts->find()
                        ->where(['WhProducts.warehouse_id' => $warehouse_id, 'WhProducts.product_id' => $product->id, 'WhProducts.balance_amt >=' => $qty]);
                if ($q->count() <= 0 && $product->product_category->isstock == 'Y') {
                    echo 'nostock';
                } else {
                    if (is_null($product) || $product == '') {
                        echo 'notfound';
                    } else {
                        $price = $this->GoldPrice->calculateLastPriceByProduct($product->id);
                        $product['new_price'] = $price;
                        $product['actual_price'] = $price['final']['sales_price'];
                        $product['max_discount'] = $price['final']['max_discount'];
                        $productJson = json_encode($product);
                        echo $productJson;
                    }
                }
            }
        } else {
            echo 'notfound';
        }
        die();
    }

    //For barcode scaner
    public function getdetailjsonorder() {
        $this->viewBuilder()->layout('ajax');
        $json = '';
        if ($this->request->is('ajax')) {
            $postData = $this->request->getData();
            $product_id = $postData['product_id'];


            $q = $this->Products->find()
                    ->select(['id', 'name', 'code', 'actual_price', 'unittype'])
                    ->where(['Products.id' => $product_id]);
            $product = $q->first();
            if (is_null($product) || $product == '') {
                echo 'notfound';
            } else {
                $json = json_encode($product);
                
            }
        } else {
            $json = 'notfound';
        }
        $this->set('json',$json);
    }

}
