<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * ServiceProduct Controller
 *
 *
 * @method \App\Model\Entity\ServiceProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceProductController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->loadComponent('Product');

        $this->viewBuilder()->layout('json');
    }

    public $Products = null;

    public function getProductByCode($code) {

        //$code = str_replace('', '%20', $code);
        //echo $code;

        $product = $this->Product->getProductByCode($code);
        $json = json_encode($product);

        $this->set(compact('json'));
    }

    public function getAllProduct() {
        $product = $this->Product->getActiveProduct();
        $json = json_encode($product);

        $this->set(compact('json'));
    }

    public function generateName() {

        //Product Cat Name+Design+Size+Weoght


        $productCategoryId = $this->request->getQuery('product_category_id');
        $sizeId = $this->request->getQuery('size_id');
        $weightId = $this->request->getQuery('weight_id');
        $designId = $this->request->getQuery('design_id');
        $percent = $this->request->getQuery('percent');
        $manualWeight = $this->request->getQuery('manual_weight');

        if ($weightId == '0' || $weightId == '') {
            $weightId = null;
        }
        //generateName($productCategoryId = null, $sizeId = null, $weightId = null, $designId = null, $manualWeight = 0) 
        $productName = $this->Product->generateName($productCategoryId, $sizeId, $weightId, $designId, $percent, $manualWeight);

        $data = [
            'product_name' => $productName,
            'product_category_id' => $productCategoryId,
            'size_id' => $sizeId,
            'weight_id' => $weightId,
            'design_id' => $designId,
            'manual_weight' => $manualWeight
        ];
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->set(compact('json'));
    }

    public function createTempProduct() {
        $data = [];

        if ($this->request->is(['POST', 'PUT'])) {
            $this->Products = TableRegistry::get('Products');
            $product = $this->Products->newEntity();


            $postData = $this->request->getData();
            //$this->log($postData,'debug');
            $productName = $postData['product_name'];
            $product->name = $productName;
            $product->code = '_temp';
            $product->cost = 0;
            $product->actual_price = 0;
            $product->isactive = 'N';
            $product->createdby = $this->Authen->getAuthenUserId();
            $product->org_id = $this->Core->getLocalOrgId();

            $result = $this->Products->save($product);
            if ($result) {
                $data = $result;
                $data['status'] = 200;
            } else {
                $data = $product->errors();
                $data['status'] = 500;
            }
        }


        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->set(compact('json'));
    }

}
