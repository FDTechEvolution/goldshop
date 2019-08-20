<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class ProductComponent extends Component {

    public $Products = null;
    public $Weights = null;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'TransactionCode'];

    public function generateProductCode($product_category_id = null) {
        $this->Products = TableRegistry::get('Products');

        $running_length = 4;
        $proCate = $this->Products->ProductCategories->get($product_category_id);
        $catCode = $proCate->code;

        /*
          $proSubCat = $this->Products->ProductSubCategories->get($product_sub_category_id);
          $subCatCode = $proSubCat->code;
         */
        $documentNo = $catCode;

        $q = $this->Products->find()
                ->where(['Products.code LIKE ' => "%$documentNo%"])
                ->order(['Products.code' => 'DESC']);
        $lastProduct = $q->first();
        //$this->log($lastProduct, 'debug');
        if (is_null($lastProduct)) {
            $currentNo = 1;
        } else {
            $lastCode = $lastProduct['code'];
            $str = str_replace($documentNo, '', $lastCode);
            $lastNo = (int) str_replace('0', '', $str);
            $currentNo = $lastNo + 1;

            //$this->log($lastNo, 'debug');
        }

        $_temp = sprintf("%'.0" . $running_length . "d", ($currentNo));
        $documentNo = $documentNo . $_temp;


        //$this->log($documentNo, 'debug');
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

    public function getCreateTempProduct($name = null, $product_category_id = null, $percent = null, $design_id = null, $weight = null, $price = 0) {
        $this->Products = TableRegistry::get('Products');
        $q = $this->Products->find()
                ->where(['name' => $name,'code'=>'_temp']);
        $product = null;
        if(sizeof($q->toArray())>0){
          $product = $q->first();
          return $product;
        }
        $product = $this->Products->newEntity();

        $product->name = $name;
        //$product->code = $this->Product->generateProductCode($product_category_id);
        $product->code = '_temp';
        $product->standard_price = 0;
        $product->actual_price = $price;
        $product->isactive = 'N';
        $product->isstock = 'Y';
        $product->product_category_id = $product_category_id;
        $product->createdby = $this->Authen->getAuthenUserId();
        $product->org_id = $this->Core->getLocalOrgId();
        $product->manual_weight = $weight;
        $product->design_id = $design_id;
        $product->percent = $percent;
        
        $result = $this->Products->save($product);
        if (!$result) {
            $this->log($product->errors(), 'debug');
        }
        //$this->log($product,'debug');
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
                ->contain(['Designs'])
                ->where(['ProductCategories.isactive' => 'Y'])
                ->order(['ProductCategories.isdefault' => 'ASC', 'ProductCategories.name' => 'ASC']);
        $productCats = $q->toArray();
        
        $lists = [];
        foreach ($productCats as $productCat){
            $designs = [];
            foreach ($productCat->designs as $design){
                array_push($designs, ['value'=>$design->id,'text'=>$design->name]);
            }
            $_pc = ['value'=>$productCat->id,'text'=>$productCat->name];
            //array_push($lists, $_pc);
            $lists[$productCat->id]['product_cat'] = $_pc;
            $lists[$productCat->id]['designs'] = $designs;
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

        return $weightList;
    }

}
