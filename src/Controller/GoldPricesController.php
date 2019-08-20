<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * GoldPrices Controller
 *
 * @property \App\Model\Table\GoldPricesTable $GoldPrices
 *
 * @method \App\Model\Entity\GoldPrice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GoldPricesController extends AppController {

    public $SdWeights = null;
    public $Costs = null;
   

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            //return $this->redirect(USERPERMISSION);
        }
        //$this->viewBuilder()->layout('clean');
        $this->SdWeights = TableRegistry::get('SdWeights');

        $this->loadComponent('GoldPrice');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        return $this->redirect(['action' => 'view']);
    }

    /**
     * View method
     *
     * @param string|null $id Gold Price id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $price = null;

        if (is_null($id)) {
            $branchId = $this->Core->getLocalBranchId();
            $q = $this->GoldPrices->find()
                    ->contain(['GoldPriceLines' => ['SdWeights', 'sort' => ['SdWeights.seq' => 'ASC']]])
                    ->where(['pricedate' => date('Y-m-d'),'GoldPrices.branch_id'=>$branchId])
                    ->order(['GoldPrices.created' => 'DESC']);
            if (sizeof($q->toArray()) == 0) {
                return $this->redirect(['action' => 'add']);
            } else {
                $price = $q->first();
            }
        } else {
            
        }

        //$weightUnittypes = $this->TransactionCode->getWeightUnittype();

        $this->set(compact('price'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $goldPrice = $this->GoldPrices->newEntity();
        $todayDate = new Date();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$this->log($data,'debug');
            //$goldPrice = $this->GoldPrices->GoldPriceLines->newEntity();
            $goldPrice->branch_id = $this->Core->getLocalBranchId();
            $goldPrice->createdby = $this->Authen->getAuthenUserId();
            $goldPrice->pricedate = $todayDate;

            if ($this->GoldPrices->save($goldPrice)) {
                $prices = $data['price'];

                foreach ($prices as $item) {
                    $line = $this->GoldPrices->GoldPriceLines->newEntity();
                    $line = $this->GoldPrices->GoldPriceLines->patchEntity($line, $item);
                    $line->gold_price_id = $goldPrice->id;
                    if (!$this->GoldPrices->GoldPriceLines->save($line)) {
                        $this->log($line->errors(), 'debug');
                    }
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->log($goldPrice->errors(), 'debug');
            }
        }


        $allGoldPrices = $this->GoldPrice->getAllLastPriceByOnline();

        $this->set(compact('todayDate', 'weightUnittypes', 'goldPrices', 'allGoldPrices'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gold Price id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $todayDate = new Date();
        $q = $this->GoldPrices->find()
                ->contain(['GoldPriceLines' => ['SdWeights', 'sort' => ['SdWeights.seq' => 'ASC']]])
                ->where(['GoldPrices.id' => $id]);
        $goldPrice = $q->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $goldPrice = $this->GoldPrices->newEntity();
            $goldPrice = $this->GoldPrices->patchEntity($goldPrice, $data);
            $goldPrice->branch_id = $this->Core->getLocalBranchId();
            $goldPrice->createdby = $this->Authen->getAuthenUserId();
            $goldPrice->pricedate = $todayDate;

            if ($this->GoldPrices->save($goldPrice)) {
                $prices = $data['price'];

                foreach ($prices as $item) {
                    $line = $this->GoldPrices->GoldPriceLines->newEntity();
                    $line = $this->GoldPrices->GoldPriceLines->patchEntity($line, $item);
                    $line->gold_price_id = $goldPrice->id;
                    if (!$this->GoldPrices->GoldPriceLines->save($line)) {
                        $this->log($line->errors(), 'debug');
                    }
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->log($goldPrice->errors(), 'debug');
            }
            $this->Flash->error(__('The gold price could not be saved. Please, try again.'));
        }
        $this->set(compact('goldPrice', 'todayDate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gold Price id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $goldPrice = $this->GoldPrices->get($id);
        if ($this->GoldPrices->delete($goldPrice)) {
            $this->Flash->success(__('The gold price has been deleted.'));
        } else {
            $this->Flash->error(__('The gold price could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   
    public function ajaxGetGoldPrice(){
        $this->viewBuilder()->layout('json');
        $goldPrices = $this->GoldPrice->getPrice();
        $json = json_encode($goldPrices);

        $this->set(compact('json'));
    }
    
    public function ajaxUpdateDayPrice() {
        $this->viewBuilder()->layout('ajax');
        
        $branchId = $this->Core->getLocalBranchId();
        $q = $this->GoldPrices->find()
                ->contain(['GoldPriceLines' => ['SdWeights', 'sort' => ['SdWeights.seq' => 'ASC']]])
                ->where(['pricedate' => date('Y-m-d'),'GoldPrices.branch_id'=>$branchId])
                ->order(['GoldPrices.created' => 'DESC']);
        if (sizeof($q->toArray()) == 0) {
            $allGoldPrices = $this->GoldPrice->getAllLastPriceByOnline();

            $todayDate = new Date();
            $goldPrice = $this->GoldPrices->newEntity();
            $goldPrice->branch_id = $this->Core->getLocalBranchId();
            $goldPrice->createdby = $this->Authen->getAuthenUserId();
            $goldPrice->pricedate = $todayDate;
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
            }
        }
    }

}
