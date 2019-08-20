<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * ServiceGoldPrices Controller
 *
 *
 * @method \App\Model\Entity\ServiceGoldPrice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceGoldPricesController extends AppController {

    public $GoldPrices = null;
    public $Costs = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
        $this->viewBuilder()->layout('json');
        $this->GoldPrices = TableRegistry::get('GoldPrices');
        $this->Costs = TableRegistry::get('Costs');
    }

    public function dailyPrice() {

        $todayDate = new Date();
        $q = $this->GoldPrices->find()
                ->contain(['GoldPriceLines' => ['SdWeights', 'sort' => ['SdWeights.seq' => 'ASC']]])
                ->where(['pricedate' => $todayDate, 'branch_id' => $this->Core->getLocalBranchId()])
                ->order(['created' => 'DESC']);
        $goldPrice = $q->first();
        $this->log($goldPrice,'debug');
        $data = [];
        if (sizeof($q->toArray()) > 0) {
            $priceLines = $goldPrice->gold_price_lines;
            $price = [];
            $purchase = [];
            foreach ($priceLines as $line) {
                if ($line->sd_weight->isdisplay == 'N') {
                    continue;
                }
                array_push($price, ['weight' => $line->sd_weight->name, 'sales' => $line->sales_price, 'purchase' => $line->purchase_price]);
                //array_push($purchase, ['weight' => $line->sd_weight->name, 'price' => $line->purchase_price]);
            }
            $data['price'] = $price;
            $data['pricedate'] = $goldPrice->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE);
        }

        $json = json_encode($data);
        $this->set(compact('json'));
    }

    public function pawnPrice() {
        $data = [];
        $q = $this->Costs->find()
                ->contain(['CostLines' => ['SdWeights'=>['Weights'], 'sort' => ['SdWeights.seq' => 'ASC']]])
                ->where([
                    'enddate IS' => NULL,
                    'OR' => [['Costs.branch_id' => $this->Core->getLocalBranchId()], ['Costs.branch_id' => '0']],
                    'Costs.org_id' => $this->Core->getLocalOrgId(),
                    'Costs.type' => 'PAWN'
                ])
                ->order(['Costs.startdate' => 'DESC', 'Costs.created' => 'DESC'])
                ->limit(1);
        $cost = $q->first();
        if(!is_null($cost)){
            //$this->log($cost,'debug');
            $_data = [];
            foreach ($cost->cost_lines as $line){
                if(sizeof($line->sd_weight->weights) >0){
                    $w = $line->sd_weight->weights[0];
                    array_push($_data, ['value'=>$w->value,'price'=>$line->amount]);
                }
            }
            $data = $_data;
        }
        $json = json_encode($data);
        $this->set(compact('json'));
    }

    public function dailySales() {
        
    }

    public function dailyPurchase() {
        
    }

}
