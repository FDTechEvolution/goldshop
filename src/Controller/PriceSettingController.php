<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * PriceSetting Controller
 *
 *
 * @method \App\Model\Entity\PriceSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PriceSettingController extends AppController {

    public $MasterPrices = null;
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->loadComponent('GoldPrice');
        
        
        $masterPrice = $this->GoldPrice->getMasterPrice();
        
        
        $this->set(compact('masterPrice'));
    }

}
