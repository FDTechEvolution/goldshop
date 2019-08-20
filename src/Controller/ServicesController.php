<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Services Controller
 *
 *
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesController extends AppController {

    public $GoldPrices = null;
    public $Weights = null;
    public $Products = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->viewBuilder()->layout('clean');
    }

    public function index() {
        
    }

    public function calculateLastPrice($weight = 0, $cost = 0) {
        $jsonData = $this->calculatePriceProcess($weight, $cost);


        echo $jsonData;
    }

    public function calculateLastPriceByProduct($product_id = null) {
        $this->Products = TableRegistry::get('Products');
        $jsonData = [];
        $q = $this->Products->find()
                ->contain(['Weights'])
                ->where(['id' => $product_id]);
        if (sizeof($q->toArray()) > 0) {
            $product = $q->first();
            $weight = 0;
            if ($product->has('weight')) {
                $weight = $product->weight->value;
            }
            $jsonData = $this->calculatePriceProcess($weight, $product->cost);
        } else {
            $jsonData = $this->calculatePriceProcess(0, 0);
        }

        echo $jsonData;
    }

    private function calculatePriceProcess($weight = 0, $cost = 0) {
        $this->GoldPrices = TableRegistry::get('GoldPrices');
        $this->Weights = TableRegistry::get('Weights');

        $maxDiscountAmt = $this->getMaxDiscount($weight);
        $data['last'] = null;
        $data['final'] = [
            'sales_price' => 0,
            'purchase_price' => 0,
            'max_discount' => $maxDiscountAmt
        ];

        //Get weight
        $q = $this->Weights->find()
                ->where(['value >=' => ($weight - 0.10), 'value <=' => ($weight + 0.10)])
                ->order(['value' => 'ASC']);
        if (sizeof($q->toArray()) > 0) {
            $weightData = $q->first();
            //$this->log($weightData,'debug');
            //Get last price
            $todayDate = new Date();
            $q = $this->GoldPrices->find()
                    ->select(['id', 'unittype', 'sales_price', 'purchase_price'])
                    ->where(['pricedate' => $todayDate, 'unittype' => $weightData->unittype])
                    ->order(['created' => 'ASC']);
            $goldPrices = $q->toArray();
            //$this->log($goldPrices,'debug');

            if (sizeof($goldPrices) > 0) {
                $lastPrice = $q->first();
                $data['last'] = $lastPrice;
                $data['final'] = [
                    'sales_price' => ($cost + $lastPrice->sales_price),
                    'purchase_price' => ($lastPrice->purchase_price),
                    'max_discount' => $maxDiscountAmt
                ];
            } else {
                
            }
        }

        $jsonData = json_encode($data);
        return $jsonData;
    }

    private function getMaxDiscount($weight = 0) {
        $maxDiscountAmt = 0;

        if ($weight >= 0.6 && $weight <= 2.5) {
            $maxDiscountAmt = 100;
        } else if ($weight >= 2.6 && $weight <= 5.5) {
            $maxDiscountAmt = 150;
        } else if ($weight >= 5.6 && $weight <= 8.0) {
            $maxDiscountAmt = 200;
        } else if ($weight >= 8.1 && $weight <= 12.09) {
            $maxDiscountAmt = 300;
        } else if ($weight >= 12.1 && $weight <= 15.18) {
            $maxDiscountAmt = 350;
        } else {
            $maxDiscountAmt = 0;
        }

        return $maxDiscountAmt;
    }

}
