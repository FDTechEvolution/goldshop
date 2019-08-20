<?php

namespace App\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\I18n\Number;
use Cake\I18n\Date;

use App\Controller\AppController;

/**
 * ApiGoldPrices Controller
 *
 *
 * @method \App\Model\Entity\ApiGoldPrice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiGoldPricesController extends AppController {
    public $MasterPrices = null;
    public $GoldPrices = null;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow();
        $this->viewBuilder()->layout('ajax');
    }
    
    public function price(){
        $this->loadComponent('GoldPrice');
        $masterPrice = $this->GoldPrice->getMasterPrice();
        
        $json = json_encode($masterPrice);
        $this->set(compact('json'));
    }
    
    public function updatePrice() {
        $content = file_get_contents('https://www.goldtraders.or.th/');
        
        $doc = new \DOMDocument();
        $doc->loadHTML($content);
        $titleObj = $doc->getElementById('DetailPlace_uc_goldprices1_lblAsTime');
        
        $title = trim($titleObj->nodeValue);
        
        $goldBarPurchaseObj = $doc->getElementById('DetailPlace_uc_goldprices1_lblBLBuy');
        $gold_bar_purchase_price = trim($goldBarPurchaseObj->nodeValue);
        
        $goldBarSalesObj = $doc->getElementById('DetailPlace_uc_goldprices1_lblBLSell');
        $gold_bar_sales_price = trim($goldBarSalesObj->nodeValue);
        
        $goldPurchaseObj = $doc->getElementById('DetailPlace_uc_goldprices1_lblOMBuy');
        $gold_purchase_price = trim($goldPurchaseObj->nodeValue);
        
        $goldSalesObj = $doc->getElementById('DetailPlace_uc_goldprices1_lblOMSell');
        $gold_sales_price = trim($goldSalesObj->nodeValue);
            
        $gold_bar_purchase_price = str_replace(',', '', trim($gold_bar_purchase_price));
        $gold_bar_sales_price = str_replace(',', '', trim($gold_bar_sales_price));
        $gold_purchase_price = str_replace(',', '', trim($gold_purchase_price));
        $gold_sales_price = str_replace(',', '', trim($gold_sales_price));


        $this->MasterPrices = TableRegistry::get('MasterPrices');

        $q = $this->MasterPrices->find()
                    ->where(['title'=>$title]);
        if(sizeof($q->toArray()) ==0){
            $price = $this->MasterPrices->newEntity();
            $price->gold_bar_purchase_price = $gold_bar_purchase_price;
            $price->gold_bar_sales_price = $gold_bar_sales_price;
            $price->gold_purchase_price = $gold_purchase_price;
            $price->gold_sales_price = $gold_sales_price;
            $price->title = $title;
            
            $this->MasterPrices->save($price);
            $this->sendDailyPriceToLine($price);
        }
      
    }

    private function sendDailyPriceToLine($price){
        $this->loadComponent('LineMessage');

        $str = 'อัพเดทราคาทองตามประกาศของสมาคมค้าทองคำ';
        $str = $str.chr(10).'วันที่ '.$price->title;
        $str = $str.chr(10).'ทองคำแท่ง รับซื้อ '
                .(Number::format($price->gold_bar_purchase_price))
                .', ขายออก '.(Number::format($price->gold_bar_sales_price));
        $str = $str.chr(10).'ทองรูปพรรณ รับซื้อ '
                .(Number::format($price->gold_purchase_price))
                .', ขายออก '.(Number::format($price->gold_sales_price));

        $data = array(
            'message' => $str
        );
        
        $this->LineMessage->sendMsg($data);
    }
    
    public function updateStorePrice() {
        $this->GoldPrices = TableRegistry::get('GoldPrices');
        $this->loadComponent('GoldPrice');
        $branchId = $this->Core->getLocalBranchId();
        $masterPrice = $this->GoldPrice->getMasterPrice();
        $data = [
            'master_price'=>$masterPrice
        ];
        $q = $this->GoldPrices->find()
                ->contain(['GoldPriceLines' => ['SdWeights', 'sort' => ['SdWeights.seq' => 'ASC']]])
                ->where(['pricedate' => date('Y-m-d'),'GoldPrices.branch_id'=>$branchId,'GoldPrices.master_price_id'=>$masterPrice->id])
                ->order(['GoldPrices.created' => 'DESC'])
                ->limit(1);
        $data['update_status'] = 'no';
        if (sizeof($q->toArray()) == 0) {
            $allGoldPrices = $this->GoldPrice->getAllLastPriceByOnline();
            
            $todayDate = new Date();
            $goldPrice = $this->GoldPrices->newEntity();
            $goldPrice->branch_id = $this->Core->getLocalBranchId();
            $goldPrice->createdby = $this->Authen->getAuthenUserId();
            $goldPrice->pricedate = $todayDate;
            $goldPrice->master_price_id = $masterPrice->id;
            if ($this->GoldPrices->save($goldPrice)) {
                foreach ($allGoldPrices as $item) {
                    $line = $this->GoldPrices->GoldPriceLines->newEntity();
                    $line->sales_price = $item['sales'];
                    $line->purchase_price = $item['purchase'];
                    $line->gold_price_id = $goldPrice->id;
                    $line->sd_weight_id = $item['sd_weight']['id'];
                    if (!$this->GoldPrices->GoldPriceLines->save($line)) {
                        $this->log($line->errors(), 'debug');
                    }
                }
            }else{
                $data['errors'] = $goldPrice->errors();
            }
            $data['update_status'] = 'yes';
        }
        $json = json_encode($data);
        $this->set(compact('json'));
    }
}
