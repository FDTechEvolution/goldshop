<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController {

    public $WhProducts = null;
    public $ProductCategories = null;
    public $Weights = null;
    public $SdWeights = null;
    public $Designs = null;
    public $Connection = null;
    public $Sizes = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        $this->loadComponent('Gold');
        $this->loadComponent('GoldPrice');
        $this->loadComponent('Product');
        $this->WhProducts = TableRegistry::get('WhProducts');
        $this->ProductCategories = TableRegistry::get('ProductCategories');
        $this->Weights = TableRegistry::get('Weights');
        $this->SdWeights = TableRegistry::get('SdWeights');
        $this->Designs = TableRegistry::get('Designs');
        $this->Sizes = TableRegistry::get('Sizes');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->Connection = ConnectionManager::get('default');
        $q = $this->request->getQuery();
        $products = [];
        if (sizeof($q) != 0) {
            $wheres = ['Products.code !=' => '_temp'];
            if ($q['product_category_id'] != null) {
                //array_push(,$wheres);
                array_push($wheres, ['Products.product_category_id' => $q['product_category_id']]);
            }

            if ($q['design_id'] != null && $q['design_id'] != 'all') {
                array_push($wheres, ['Products.design_id' => $q['design_id']]);
            }
            //weight_id
            if ($q['weight_id'] != null && $q['weight_id'] != '') {
                array_push($wheres, ['Products.weight_id' => $q['weight_id']]);
            }

            $q = $this->Products->find()
                    ->contain(['Orgs', 'ProductCategories', 'UserCreated', 'Weights', 'Images'])
                    ->where($wheres)
                    ->order(['Products.name' => 'ASC', 'Products.created' => 'DESC']);
            $products = $q->toArray();
        }


        //$products = $this->Json->read('products.json');
        //debug($products[0]);
        //die();

        $percents = $this->Gold->getGoldPercent();
        $unitTypeList = $this->TransactionCode->getUnitType();
        $productType = $this->TransactionCode->getProductType();
        $productCats = $this->Products->ProductCategories->find('list');
        $weights = $this->Product->getWeightList();


        $this->set(compact('products', 'percents', 'weights', 'productCats', 'productType', 'unitTypeList'));
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

            if ($data['percent'] == '-') {
                $product->percent = null;
            }


            if ($data['isservice'] == 'Y') {
                $product->size_id = null;
                $product->weight_id = null;
                $product->design_id = null;
                $product->percent = null;
                $product->image_id = null;
                $product->cost = 0;
            }

            if ($data['weight_id'] == '0') {
                $product->weight_id = NULL;
                $product->manual_weight = $data['manual_weight'];
            }

            $img_id = $this->UploadImage->uploadproductimage($this->request->getData('img'));
            $product->image_id = $img_id['image_id'];

            if ($this->checkDuplicate($product)) {
                if ($this->Products->save($product)) {
                    $this->Flash->success(__('บันทึก "' . $product->name . '" เป็นสินค้าใหม่แล้ว'));

                    $this->updateJsonData();
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

    public function autoGenerate() {
        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            //$this->log($data,'debug');

            $productCategoryId = $data['product_category_id'];
            $designId = isset($data['design_id']) ? $data['design_id'] : '';
            $sizeId = isset($data['size_id']) ? $data['size_id'] : '';
            $percen = $data['percent'];
            $weighId = $data['weight_id'];
            $cost = $data['cost'];

            $weight = $this->Weights->find()
                    ->contain(['SdWeights'])
                    ->where(['Weights.id' => $weighId])
                    ->first();
            $productCategory = $this->ProductCategories->find()
                    ->contain(['Sizes', 'Designs'])
                    ->where(['ProductCategories.id' => $productCategoryId])
                    ->first();
            $sizes = $productCategory['sizes'];
            $designs = $productCategory['designs'];

            $loopData = ['cat' => $productCategory];
            if (is_null($designId) || $designId == '' || $designId == 'all') {
                if (sizeof($designs) == 0) {
                    $designs = [['id' => null, 'name' => '']];
                }
                $loopData['designs'] = $designs;
            } else {
                $design = $this->Designs->find()
                        ->where(['id' => $designId])
                        ->first();
                $loopData['designs'] = [['id' => $design->id, 'name' => $design->name]];
            }

            if (is_null($sizeId) || $sizeId == '' || $sizeId == 'all') {
                if (sizeof($sizes) == 0) {
                    $sizes = [['id' => null, 'name' => '']];
                }
                $loopData['sizes'] = $sizes;
            } else {
                $size = $this->Sizes->find()
                        ->where(['id' => $sizeId])
                        ->first();
                $loopData['sizes'] = [['id' => $size->id, 'name' => $size->name]];
            }

            $countProductErr = 0;
            foreach ($loopData['designs'] as $design) {
                foreach ($loopData['sizes'] as $size) {
                    $product = $this->Products->newEntity();
                    $sdWeightName = isset($weight['sd_weight']['code']) ? $weight['sd_weight']['code'] : '';

                    //$productName = $this->generateProductName($productCategory['name'], $size['name'], $sdWeightName, $design['name'], $weight->name);

                    $productName = $this->Product->generateName($productCategory['id'], $size['id'], $weight['id'], $design['id']);

                    $product->product_category_id = $productCategoryId;
                    $product->name = $productName;
                    $product->createdby = $this->Authen->getAuthenUserId();
                    $product->org_id = $this->Core->getLocalOrgId();
                    $product->code = $this->Product->generateProductCode($product->product_category_id);
                    $product->isactive = 'Y';
                    $product->size_id = $size['id'];
                    $product->weight_id = $weighId;
                    $product->design_id = $design['id'];
                    $product->percent = $percen;
                    $product->image_id = null;
                    $product->cost = $cost;
                    if ($this->checkDuplicate($product)) {
                        if ($this->Products->save($product)) {
                            
                        } else {
                            $this->log($product->errors(), 'debug');
                            $countProductErr += 1;
                        }
                    }
                }
            }
        }
        $this->updateJsonData();
        return $this->redirect(['controller' => 'products', 'action' => 'index']);
    }

    private function updateJsonData() {
        $q = $this->Products->find()
                ->contain(['Orgs', 'ProductCategories', 'UserCreated', 'Weights', 'Images'])
                ->where(['Products.code !=' => '_temp'])
                ->order(['Products.name' => 'ASC', 'Products.created' => 'DESC']);
        $products = $q->toArray();

        $this->Json->write('products.json', 'products',$products);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $product = $this->Products->find()
                ->contain(['WhProducts', 'ProductCategories', 'Sizes', 'Designs', 'Weights'])
                ->where(['Products.id' => $id])
                ->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->get($product->id);
            $data = $this->request->getData();
            
            $product = $this->Products->patchEntity($product, $data);
            //$this->log($product,'debug');
            $product->modifiedby = $this->Authen->getAuthenUserId();

            if ($data['percent'] == '-') {
                $product->percent = null;
            }

            if ($data['isservice'] == 'Y') {
                $product->size_id = null;
                $product->weight_id = null;
                $product->design_id = null;
                $product->percent = null;
                $product->image_id = null;
                $product->cost = 0;
            }

            if ((!isset($data['weight_id'])) || $data['weight_id'] == '0' || $data['weight_id'] == '') {
                $product->weight_id = NULL;
            }else{
                $product->weight_id = $data['weight_id'];
            }

            if (!is_null($data['img']) && $data['img'] != '') {
                $img_id = $this->UploadImage->uploadDesign($this->request->getData('img'));
                $product->image_id = $img_id['image_id'];
            }
            
            //$this->log($product,'debug');
            if ($this->Products->save($product)) {
                $this->Flash->success(__('บันทึกการแก้ไข "' . $product->name . '" แล้ว'));

                //$this->updateJsonData();
                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->log($data, 'debug');
                $this->log($product->errors(), 'debug');
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $isShowError = false;
        $errMsg = '';
        if ($product->isprinted == 'XX') {
            $isShowError = true;
            $errMsg = 'สินค้านี้ดำเนินการปริ้นป้ายแล้ว';
        }
        /*
        if (sizeof($product['wh_products']) > 0) {
            $isShowError = true;
            if ($errMsg != '') {
                $errMsg .= ' และ ';
            }

            $errMsg .= 'มีการบันทึกลงสต๊อคเรียบร้อยแล้ว';
        }
        if ($isShowError) {
            $this->Flash->error($errMsg . ' เราแนะนำไม่ให้แก้ไขใด ๆ');
        }
         * 
         */
        //$productCatJson = $this->getProductCatJSON();
        $percents = $this->Gold->getGoldPercent();
        $unitTypeList = $this->TransactionCode->getUnitType();
        $productType = $this->TransactionCode->getProductType();
        $productCats = $this->Products->ProductCategories->find('list');
        $weights = $this->Product->getWeightList();
        //$orgs = $this->Products->Orgs->find('list', ['limit' => 200]);
        $this->set(compact('product', 'unitTypeList', 'productType', 'productCats', 'percents', 'weights'));
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
                ->where(['product_id' => $id]);
        if (sizeof($q->toArray()) > 0) {
            $this->Flash->error(__('ไม่สามารถลบได้ มีการใช้สินค้านี้อยู่'));
            return $this->redirect(['action' => 'edit', $id]);
        }
        
        $product->isactive = 'N';




        if ($this->Products->save($product)) {
            $this->updateJsonData();
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
                ->contain(['Designs', 'Sizes' => ['sort' => ['Sizes.name' => 'ASC']], 'Weights'])
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
        $_temp['isservice'] = $data['type'] == 'S' ? 'Y' : 'N';


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
            if (is_null($qty) || strtolower($qty) == 'nan' || $qty == '') {
                $qty = 1;
            }
            $qty = intval($qty);


            $q = $this->Products->find()
                    ->select(['id', 'name', 'code', 'actual_price', 'unittype'])
                    ->contain(['Weights'=>['fields'=>['value']],'ProductCategories' => [
                            'fields' => ['isstock']
                ]])
                    ->where(['Products.code' => $code])
                    ->limit(1);
            $product = $q->first();
            if(!(isset($product['weight']['value']))){
                $product['weight'] = ['value'=>''];
            }
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
                        if ($product['actual_price'] != 0 && $product['actual_price'] != null && $product['actual_price'] != '') {
                            $product['new_price'] = 0;
                            $product['actual_price'] = $product['actual_price'];
                            $product['max_discount'] = 0;
                            $productJson = json_encode($product);
                            echo $productJson;
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
        $this->set('json', $json);
    }

    public function printQrcode() {
        $this->Connection = ConnectionManager::get('default');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            //$this->log($data,'debug');

            $productIds = $data['product_id'];
            $qtys = $data['qty'];
            $products = [];

            foreach ($productIds as $key => $id) {
                $product = $this->Products->find()
                        ->contain(['ProductCategories', 'Designs', 'Sizes', 'Weights' => ['SdWeights']])
                        ->where(['Products.id' => $id])
                        ->order(['Products.name' => 'ASC'])
                        ->first();
                $product['qty'] = $qtys[$key];

                //Update printed
                if ($product->isprinted == 'N') {
                    $product->isprinted = 'Y';
                    $this->Products->save($product);
                }



                array_push($products, $product);
            }

            $this->set(compact('products'));
        }


        $productCategories = $this->ProductCategories->find()
                ->order(['ProductCategories.name' => 'ASC'])
                ->toArray();
        foreach ($productCategories as $key => $cat) {
            $sql = 'select p.id,p.name,p.code,p.percent,p.actual_price,p.cost,p.cost2,d.name as designname,s.name as sizename,w.name as weightname,sdw.name as sdweightname '
                    . 'from products p '
                    . 'left join weights w on p.weight_id = w.id '
                    . 'left join sd_weights sdw on w.sd_weight_id = sdw.id '
                    . 'left join sizes s on p.size_id = s.id '
                    . 'left join designs d on p.design_id = d.id '
                    . 'where p.isactive="Y" and p.product_category_id = :product_category_id and p.code !="_temp"'
                    . 'order by p.product_category_id,p.design_id,w.name,s.name ';

            $result = $this->Connection->execute($sql, ['product_category_id' => $cat['id']])
                    ->fetchAll('assoc');
            $productCategories[$key]['products'] = $result;
        }

        $this->set(compact('productCategories'));
    }

}
