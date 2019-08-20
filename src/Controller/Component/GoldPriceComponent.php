<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class GoldPriceComponent extends Component {

    public $GoldPrices = null;
    public $GoldPriceLines = null;
    public $Weights = null;
    public $Products = null;
    public $Costs = null;
    public $CostLines = null;
    public $SdWeights = null;
    public $MasterPrices = null;
    public $components = ['Core', 'Util', 'Authen', 'DocSequent'];

    public function getMasterPrice() {
        $this->MasterPrices = TableRegistry::get('MasterPrices');
        $q = $this->MasterPrices->find()
                ->order(['created' => 'DESC'])
                ->limit(1);
        $masterPrice = $q->first();
        return $masterPrice;
    }

    public function getPrice() {
        $data = $this->getContent();
        return $data;
    }

    private function getContent() {
        $data = [
            'title' => 'ราคาทองตามประกาศของสมาคมค้าทองคำ'
        ];
        $url = 'https://www.goldtraders.or.th/Default.aspx';
        $content = file_get_contents($url);
        $first_step = explode('<div id="DetailPlace_uc_goldprices1_GoldPricesUpdatePanel">', $content);
        $second_step = explode("</table>", $first_step[1]);
        $finalContent = $second_step[0];

        $data['date'] = $this->getDate($finalContent);
        $data['gold_price'] = $this->getGoldPrice($finalContent);

        return $data;
        //$this->log($data, 'debug');
    }

    private function getDate($c) {
        $this->log($c, 'debug');
        $a = explode('<span id="DetailPlace_uc_goldprices1_lblAsTime"><b><font size="3">', $c);
        $b = explode('</font></b></span></div>', $a[1]);
        //$this->log($b, 'debug');

        return $b[0];
    }

    private function getGoldPrice($c) {
        $a = strip_tags($c);
        //$this->log($a, 'debug');
        $string = preg_replace('/\s+/', '_', trim($a));

        $string = str_replace(',', '', $string);
        //$this->log($string, 'debug');
        $string = explode('_', $string);

        //$this->log($string, 'debug');

        $data = [
            'gb' => [
                'title' => $string[18],
                'purchase' => round((float) $string[19]),
                'sales' => round((float) $string[20]),
            ],
            'g' => [
                'title' => $string[21],
                'purchase' => round((float) $string[22]),
                'sales' => round((float) $string[23]),
            ]
        ];

        return $data;
    }

    public function getAllLastPriceByOnline() {
        //$this->log('getAllLastPriceByOnline', 'debug');
        $this->SdWeights = TableRegistry::get('SdWeights');
        $this->Costs = TableRegistry::get('Costs');

        $masterPrice = $this->getMasterPrice();

        $bahtSalesPrice = ceil($masterPrice->gold_bar_sales_price);
        $bahtPurchasePrice = ceil($masterPrice->gold_bar_purchase_price);

        //$this->log('bahtSalesPrice: ' . $bahtSalesPrice, 'debug');
        //$this->log('bahtPurchasePrice: ' . $bahtPurchasePrice, 'debug');

        //Get 1b weight
        $q = $this->SdWeights->find()
                ->contain(['Weights'])
                ->where(['SdWeights.code' => '1B']);
        $bathWeight = $q->first();
        $bathWeightValue = $bathWeight['weights'][0]['value'];
        $oneGSalesPrice = $bahtSalesPrice / $bathWeightValue;
        $oneGPurchasePrice = $bahtPurchasePrice / $bathWeightValue;

        //$this->log('bathWeightValue: ' . $bathWeightValue, 'debug');
        //$this->log('oneGSalesPrice: ' . $oneGSalesPrice, 'debug');
        //$this->log('oneGPurchasePrice: ' . $oneGPurchasePrice, 'debug');


        //$bahtSalesPrice = 19850;
        // $slungSalesPrice = ceil($bahtSalesPrice / 4);
        //$slungPurchasePrice = ceil($bahtPurchasePrice / 4);

        $q = $this->SdWeights->find()
                ->contain(['Weights'])
                ->order(['seq' => 'ASC']);
        $sdWeights = $q->toArray();
        //$this->log($sdWeights,'debug');

        $q = $this->Costs->find()
                //->contain(['CostLines' => ['sort' => ['amount' => 'ASC']]])
                ->where(['enddate IS' => NULL,'branch_id'=>$this->Core->getLocalBranchId(),'type'=>'NORMAL','Costs.org_id' => $this->Core->getLocalOrgId()])
                ->order(['startdate' => 'DESC', 'created' => 'DESC'])
                ->limit(1);
        $cost = $q->first();
        $cost_id = null;
        if (!is_null($cost) && $cost != '') {
            $cost_id = $cost->id;
        }
        //$this->log($cost,'debug');

        $prices = [];

        foreach ($sdWeights as $item) {
            //Calculate
            $salesPrice = $bahtSalesPrice;
            $purchasePrice = $bahtPurchasePrice;
            $spacialCost = 800;
            $oneGSpacialCost = $spacialCost / $bathWeightValue;
            //$this->log('oneGSpacialCost: ' . $oneGSpacialCost, 'debug');

            if ($item->has('weights') && sizeof($item['weights']) > 0) {
                $_weight = $item['weights'][0]['value'];
                $salesPrice = $oneGSalesPrice * $_weight;
                $purchasePrice = $oneGPurchasePrice * $_weight;
                $addonPrice = $oneGSpacialCost * $_weight;

                $salesPrice = round($salesPrice, 0);
                $purchasePrice = round($purchasePrice - $addonPrice, 0);
                //$this->log('SD Weight Name: ' . $item['weights'][0]['name'], 'debug');
                //$this->log('Sales Price: '.$salesPrice,'debug');
                //$this->log('Purchase Price: '.$purchasePrice,'debug');
                //$this->log('','debug');
            }

            /*
              if (!is_null($item->formula) && $item->formula != '') {
              //$this->log($item->formula,'debug');
              $f1 = $item->formula;
              $f1 = str_replace("bath", $bahtSalesPrice, $f1);
              //$this->log($f1, 'debug');
              $salesPrice = $this->Util->evalmath($f1);

              $f1 = $item->formula;
              $f1 = str_replace("bath", $bahtPurchasePrice, $f1);
              $purchasePrice = $this->Util->evalmath($f1);

              //800
              $f1 = $item->formula;
              $f1 = str_replace("bath", 800, $f1);
              $spacialCost = $this->Util->evalmath($f1);


              //$this->log($spacialCost,'debug');
              }
             * 
             */

            //$purchasePrice = $purchasePrice - $spacialCost;

            $finalPrices = $this->getCost($cost_id, $item->id, $salesPrice, $purchasePrice);
            $_arr = [
                'sd_weight' => $item,
                'sales' => $finalPrices['sales'],
                'purchase' => $finalPrices['purchase']
            ];
            //$this->log($_arr,'debug');

            array_push($prices, $_arr);
        }



        return $prices;
    }

    private function getCost($cost_id = null, $sd_weight_id = null, $salesPrice = 0, $purchasePrice = 0) {
        //$this->log('salesPrice: ' . $salesPrice, 'debug');
        //$this->log('purchasePrice: ' . $purchasePrice, 'debug');
        $this->CostLines = TableRegistry::get('CostLines');

        $finalPrices = ['sales' => $salesPrice, 'purchase' => $purchasePrice];
        if (!is_null($cost_id) && $cost_id != '') {
            $q = $this->CostLines->find()
                    ->where(['cost_id' => $cost_id, 'sd_weight_id' => $sd_weight_id])
                    ->limit(1);

            $costLine = $q->first();
            //$this->log($costLine,'debug');
            if (sizeof($q->toArray()) > 0) {
                $salesPrice = $salesPrice + $costLine->amount;
                $purchasePrice = $purchasePrice - $costLine->amount2;
            }
        }
        //$this->log('salesPrice: ' . $salesPrice, 'debug');

        $roundupAt = 50;
        //$this->log('salesPrice % roundupAt: ' . ($salesPrice % $roundupAt), 'debug');
        if ($salesPrice > 0 && ($salesPrice % $roundupAt) != 0) {
            if (($salesPrice % $roundupAt) >= ($roundupAt / 2)) {
                $salesPrice = $salesPrice + ($roundupAt - ($salesPrice % $roundupAt));
            } else {
                $salesPrice = $salesPrice - (($salesPrice % $roundupAt));
            }
        }
        //$this->log('salesPrice: ' . $salesPrice, 'debug');
        //$this->log('purchasePrice % roundupAt: ' . ($purchasePrice % $roundupAt), 'debug');
        if ($purchasePrice > 0 && ($purchasePrice % $roundupAt) != 0) {

            if (($purchasePrice % $roundupAt) >= ($roundupAt / 2)) {
                $purchasePrice = $purchasePrice + ($roundupAt - ($purchasePrice % $roundupAt));
            } else {
                $purchasePrice = $purchasePrice - (($purchasePrice % $roundupAt));
            }
        }


        $finalPrices = ['sales' => $salesPrice, 'purchase' => $purchasePrice];

        return $finalPrices;
    }

    public function calculateLastPrice($weight = 0, $cost = 0) {
        $jsonData = $this->calculatePriceProcess($weight, $cost);


        return $jsonData;
    }

    public function calculateLastPriceByProduct($product_id = null) {
        $this->Products = TableRegistry::get('Products');
        $data = [];
        $q = $this->Products->find()
                ->contain(['Weights'])
                ->where(['Products.id' => $product_id]);
        if (sizeof($q->toArray()) > 0) {
            $product = $q->first();
            $weight = 0;
            if ($product->has('weight')) {
                $weight = $product->weight->value;
            }
            $data = $this->calculatePriceProcess($weight, $product->cost);
        } else {
            $data = $this->calculatePriceProcess(0, 0);
        }

        return $data;
    }

    private function calculatePriceProcess($weight = 0, $cost = 0) {
        $this->GoldPrices = TableRegistry::get('GoldPrices');
        $this->GoldPriceLines = TableRegistry::get('GoldPriceLines');
        $this->Weights = TableRegistry::get('Weights');

        $maxDiscountAmt = $this->getMaxDiscount($weight);
        $data['last'] = null;
        $data['final'] = [
            'sales_price' => 0,
            'purchase_price' => 0,
            'max_discount' => $maxDiscountAmt
        ];
        $todayDate = new Date();



        //Get weight
        $q = $this->Weights->find()
                ->where(['value >=' => ($weight - 0.10), 'value <=' => ($weight + 0.10)])
                ->order(['value' => 'ASC']);
        if (sizeof($q->toArray()) == 0) {
            return $data;
        }
        $productWeight = $q->first();

        $q = $this->GoldPrices->find()
                ->contain(['GoldPriceLines' => ['SdWeights' => ['Weights']]])
                ->where(['GoldPrices.pricedate' => $todayDate])
                ->order(['GoldPrices.created' => 'DESC']);
        if (sizeof($q->toArray()) == 0) {
            return $data;
        }
        $goldPrice = $q->first();
        $goldPriceLines = $goldPrice->gold_price_lines;

        foreach ($goldPriceLines as $line) {
            if ($line->sd_weight->has('weights') && sizeof($line->sd_weight->weights) > 0) {

                $_weights = $line->sd_weight->weights;
                // $this->log($_weights,'debug');
                $_weight = $_weights[0];
                if ($_weight['value'] == $productWeight['value']) {
                    $data['final'] = [
                        'sales_price' => ($cost + $line->sales_price),
                        'purchase_price' => ($line->purchase_price),
                        'max_discount' => $maxDiscountAmt
                    ];
                }
            }
        }



        /*
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
         * 
         */


        //$jsonData = json_encode($data);
        return $data;
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
