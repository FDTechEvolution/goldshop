<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class ProductComponent extends Component {

    public $Products = null;
    public $Weights = null;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'TransactionCode', 'Json', 'ReadSqlFiles'];
    public $Connection;

    public function generateName($productCategoryId = null, $sizeId = null, $weightId = null, $designId = null, $percent = null, $manualWeight = 0) {
        //Product Cat Name+Design+Size+Weoght

        $productName = '';
        if (!is_null($productCategoryId) && $productCategoryId != '') {
            $productCategories = $this->Json->readLatestByModel('product_categories');
            //$this->log($productCategories,'debug');
            $productCategoryIndex = array_search($productCategoryId, array_column($productCategories, 'id'));

            if (!is_null($productCategoryIndex) && $productCategoryIndex != '') {
                $productCategory = $productCategories[$productCategoryIndex];
                //$this->log($productCategoryIndex, 'debug');
                $productName .= $productCategory['name'];
            }
        }

        if (!is_null($percent) && is_numeric($percent)) {
            $productName .= ' ' . number_format($percent, 2) . '%';
        }

        if (!is_null($designId) && $designId != '') {
            $designs = $this->Json->readLatestByModel('designs');
            $designIndex = array_search($designId, array_column($designs, 'id'));
            if (is_numeric($designIndex)) {
                $design = $designs[$designIndex];

                $productName .= ' ' . $design['name'];
            }
        }

        if (!is_null($sizeId) && $sizeId != '') {
            $sizes = $this->Json->readLatestByModel('sizes');
            $sizeIndex = array_search($sizeId, array_column($sizes, 'id'));
            if (is_numeric($sizeIndex)) {
                $size = $sizes[$sizeIndex];

                $productName .= ' ' . $size['name'];
            }
        }

        $this->log($weightId, 'debug');
        if (!is_null($weightId) && $weightId != '') {
            $weights = $this->Json->readLatestByModel('weights');
            $weightIndex = array_search($weightId, array_column($weights, 'id'));

            if (is_numeric($weightIndex)) {
                $weight = $weights[$weightIndex];
                $this->log($weight, 'debug');
                if ($weight['sd_weight_id'] != null && $weight['sd_weight_id'] != '') {
                    $productName .= sprintf(' %s', $weight['sd_weight']['code']);
                } else {
                    $productName .= sprintf(' %s', $weight['name']);
                }
            }
        } else {
            if (is_numeric($manualWeight) && $manualWeight > 0) {
                $productName .= sprintf(' %sG', $manualWeight);
            }
        }

        $productCategories = $this->Json->readLatestByModel('product_categories');

        return $productName;
    }

    public function isDuplicate($productId = null, $productName = '') {
        $count = 0;
        $this->Products = TableRegistry::get('Products');
        if (is_null($productId) || $productId == '') {
            
        } else {
            $count = $this->Products->find()->where(['name' => $productName, 'id !=' => $productId])->count();
        }

        return $count > 0;
    }

    public function generateProductCode($product_category_id = null) {
        $this->Products = TableRegistry::get('Products');

        $running_length = 4;
        $proCate = $this->Products->ProductCategories->get($product_category_id);
        $catCode = $proCate->code;
        $countDuplicate = 0;
        $documentNo = '';

        $time = Time::now();


        do {
            $countDuplicate = 0;
            /*
              $qCount = $this->Products->find()
              ->where(['Products.product_category_id' => $product_category_id])
              ->count();
              $qCount = $qCount + 1;

              $_temp = sprintf("%'.0" . $running_length . "d", ($qCount));
              $documentNo = $catCode . $_temp;
             * 
             */
            $_temp = $time->format("ymdHis") . round(microtime(true) % 100);
            $documentNo = $catCode . $_temp;

            $countDuplicate = $this->Products->find()->where(['Products.code' => $documentNo])->count();
        } while ($countDuplicate > 0);

        return $documentNo;
    }

    /*
      public function getCreateProduct($name = null, $type = null, $product_category_id = null, $percent = null, $design_id = null, $weight = null, $price = 0) {
      $this->Products = TableRegistry::get('Products');

      $q = $this->Products->find()
      ->where(['name' => $name]);
      $product = $q->first();

      if (is_null($product) || $product == '') {
      $product = $this->Products->newEntity();
      $product->name = $name;
      //$product->code = $this->Product->generateProductCode($product_category_id);
      $product->code = '_temp';
      $product->standard_price = 0;
      $product->actual_price = $price;
      $product->isactive = 'Y';
      $product->isstock = 'Y';
      $product->type = $type;
      $product->product_category_id = $product_category_id;
      $product->createdby = $this->Authen->getAuthenUserId();
      $product->org_id = $this->Core->getLocalOrgId();
      $product->weight_id = $this->getSaveWeight($weight);
      $product->design_id = $design_id;
      $product->percent = $percent;

      $result = $this->Products->save($product);
      if (!$result) {
      $this->log($product->errors(), 'debug');
      }
      return $product;
      } else {
      return $product;
      }
      }
     *
     */

    public function getCreateTempProduct($name = null, $product_category_id = null, $percent = null, $design_id = null, $weight = 0, $price = 0) {
        $this->Products = TableRegistry::get('Products');

        $product = $this->Products->newEntity();
        $product->name = $name;
        $product->code = '_temp';
        $product->standard_price = 0;
        $product->actual_price = $price;
        $product->isactive = 'N';
        $product->isstock = 'Y';
        $product->product_category_id = $product_category_id;
        $product->createdby = $this->Authen->getAuthenUserId();
        $product->org_id = $this->Core->getLocalOrgId();
        $product->manual_weight = $weight;
        $product->design_id = null;
        $product->percent = $percent;

        $result = $this->Products->save($product);
        if (!$result) {
            $this->log($product->errors(), 'debug');
        }
        //$this->log($product,'debug');
        return $product;
    }

    private function verifyProduct($name = null, $product_category_id = null, $percent = null, $design_id = null, $weight = 0, $price = 0) {
        $product = $this->Products->newEntity();
        $product->name = $name;

        $product->code = '_temp';
        $product->standard_price = 0;
        $product->actual_price = $price;
        $product->isactive = 'Y';
        $product->manual_weight = $weight;
        $product->product_category_id = $product_category_id;
        $product->createdby = $this->Authen->getAuthenUserId();
        $product->org_id = $this->Core->getLocalOrgId();
        $product->design_id = $design_id;
        $product->percent = $percent;

        $result = $this->Products->save($product);
        if (!$result) {
            $this->log($product->errors(), 'debug');
        }
        return $product;
    }

    public function getProductJsonList() {
        $this->Products = TableRegistry::get('Products');
        $q = $this->Products->find()
                ->select(['name', 'id'])
                ->where(['code !=' => '_temp'])
                ->order(['name' => 'ASC']);
        $products = $q->toArray();

        return json_encode($products);
    }

    public function getProductLabelCodeJsonList() {
        $this->Connection = ConnectionManager::get('default');
        $sql = 'select p.id,p.name,p.code,c.label as c_label,d.label as d_label,s.name as s_name,p.cost,p.cost2,p.actual_price,sdw.code as w_code    
from 
	products p 
    join product_categories c on p.product_category_id = c.id 
    left join designs d on p.design_id = d.id 
    left join sizes s on p.size_id = s.id 
    left join weights w on p.weight_id = w.id 
    left join sd_weights sdw on w.sd_weight_id = sdw.id 
where p.isactive = "Y" and p.code !="_temp"';

        $result = $this->Connection->execute($sql, [])->fetchAll('assoc');

        $products = $result;
        foreach ($result as $index => $item) {
            $label = $item['c_label'];

            if (!is_null($item['d_label']) && $item['d_label'] != '') {
                $label .= ' ' . $item['d_label'];
            }
            if (!is_null($item['s_name']) && $item['s_name'] != '') {
                $label .= ' ' . $item['s_name'];
            }
            if (!is_null($item['w_code']) && $item['w_code'] != '') {
                $label .= ' ' . $item['w_code'];
            }
            if (!is_null($item['cost2']) && $item['cost2'] != '' && $item['cost2'] != '00.00') {
                $label .= ' ' . $item['cost2'];
            }
            if (!is_null($item['cost']) && $item['cost'] != '' && $item['cost'] > 0) {
                $label .= ' ' . number_format($item['cost'], 0);
            }


            $products[$index]['label'] = $label;
        }

        return json_encode($products);
    }

    /*
      private function getSaveWeight($weightValue = 0) {
      $q = $this->Products->Weights->find()
      ->where(['value' => $weightValue]);
      if (sizeof($q->toArray()) == 0) {
      $weight = $this->Products->Weights->newEntity();
      $weight->name = $weightValue . 'g';
      $weight->value = $weightValue;
      $weight->isactive = 'Y';
      $weight->createdby = $this->Authen->getAuthenUserId();
      $this->Products->Weights->save($weight);
      return $weight->id;
      }

      $weight = $q->first();
      return $weight->id;
      }
     *
     */

    public function getProductCategoryList() {
        $this->Products = TableRegistry::get('Products');

        $productCats = $this->Products->ProductCategories->find('list', [
            'conditions' => ['ProductCategories.isactive' => 'Y'],
            'order' => ['ProductCategories.isdefault' => 'ASC', 'ProductCategories.name' => 'ASC']
        ]);

        return $productCats;
    }

    public function getProductCategorWithDesignList() {
        $this->Products = TableRegistry::get('Products');
        $q = $this->Products->ProductCategories->find()
                ->contain(['Designs' => ['sort' => ['Designs.name' => 'ASC']], 'Sizes' => ['sort' => ['Sizes.name' => 'ASC']]])
                ->where(['ProductCategories.isactive' => 'Y'])
                ->order(['ProductCategories.name' => 'ASC']);
        $productCats = $q->toArray();

        $lists = [];
        foreach ($productCats as $productCat) {
            $designs = [];
            foreach ($productCat->designs as $design) {
                array_push($designs, ['value' => $design->id, 'text' => $design->name]);
            }

            $sizes = [];
            foreach ($productCat->sizes as $size) {
                array_push($sizes, ['value' => $size->id, 'text' => $size->name]);
            }

            $_pc = ['value' => $productCat->id, 'text' => $productCat->name];
            //array_push($lists, $_pc);
            $lists[$productCat->id]['product_cat'] = $_pc;
            $lists[$productCat->id]['designs'] = $designs;
            $lists[$productCat->id]['sizes'] = $sizes;
        }

        return $lists;
    }

    public function getPawnProductCategoryList() {
        $this->Products = TableRegistry::get('Products');

        $productCats = $this->Products->ProductCategories->find('list', [
            'conditions' => ['ProductCategories.isactive' => 'Y', 'ProductCategories.type IS NOT NULL'],
            'order' => ['ProductCategories.isdefault' => 'ASC', 'ProductCategories.name' => 'ASC']
        ]);
        // $this->log($productCats, 'debug');
        return $productCats;
    }

    public function getWeightList() {
        $this->Weights = TableRegistry::get('Weights');

        //$weightUnittypes = $this->TransactionCode->getWeightUnittype();
        $q = $this->Weights->find()
                ->contain(['SdWeights'])
                ->where(['isactive' => 'Y'])
                ->order(['Weights.name' => 'ASC']);
        $weights = $q->toArray();

        $weightList = [];
        foreach ($weights as $weight) {
            $name = '';
            if (is_null($weight->sd_weight) || $weight->sd_weight == '') {
                $name = $weight->name;
            } else {
                $name = $weight->name . ' (' . $weight->sd_weight->name . ')';
            }
            $weightList[$weight->id] = $name;
        }
        $weightList['0'] = 'อื่น ๆ';

        return $weightList;
    }

    public function getProductByCode($code = null) {

        if (is_null($code) || $code == '') {
            return [];
        }

        $this->Products = TableRegistry::get('Products');

        $product = $this->Products->find()
                ->where(['Products.code' => $code])
                ->first();

        return $product;
    }

    public function getById($productId = null) {
        if (is_null($productId)) {
            return null;
        }
        $this->Connection = ConnectionManager::get('default');
        $sql = $this->ReadSqlFiles->read('product_detail.sql');
        $result = $this->Connection->execute($sql, ['product_id' => $productId])->fetchAll('assoc');
        if (sizeof($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function getActiveProduct() {
        $this->Products = TableRegistry::get('Products');

        $products = $this->Products->find()
                ->select(['id', 'name', 'code', 'cost'])
                ->order(['Products.name' => 'ASC'])
                ->where(['Products.isactive' => 'Y', 'Products.code !=' => '_temp'])
                ->toArray();

        //$productJson = json_encode($products);
        return $products;
    }

}
