<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\ORM\TableRegistry;

/**
 * Costs Controller
 *
 * @property \App\Model\Table\CostsTable $Costs
 *
 * @method \App\Model\Entity\Cost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CostsController extends AppController {

    public $SdWeights = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('clean');
        $this->SdWeights = TableRegistry::get('SdWeights');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $q = $this->Costs->find()
                ->order(['created' => 'DESC']);
        $costs = $q->toArray();
        $cost = $this->Costs->newEntity();

        if ($this->request->is('post')) {
            $cost = $this->Costs->patchEntity($cost, $this->request->getData());
            $cost->createdby = $this->Authen->getAuthenUserId();

            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cost could not be saved. Please, try again.'));
        }

        $this->set(compact('costs', 'cost'));
    }

    public function view($id = null) {
        $cost = null;

        if (is_null($id)) {
            $q = $this->Costs->find()
                    ->contain(['Branches','CostLines' => ['SdWeights', 'sort' => ['SdWeights.seq' => 'ASC']]])
                    ->where(['enddate IS' => NULL,'Costs.branch_id'=>$this->Core->getLocalBranchId()])
                    ->order(['Costs.startdate' => 'DESC', 'Costs.created' => 'DESC'])
                    ->limit(1);
            $cost = $q->first();
            if (sizeof($q->toArray()) == 0) {
                return $this->redirect(['action' => 'add']);
            }
        } else {
            
        }

        //$weightUnittypes = $this->TransactionCode->getWeightUnittype();
        $this->set(compact('cost'));
    }

    public function add() {
        $cost = $this->Costs->newEntity();

        if ($this->request->is('post')) {
            $costLines = $this->request->getData();

            $cost->branch_id = $this->Core->getLocalBranchId();
            $cost->startdate = date('Y-m-d');
            $cost->createdby = $this->Authen->getAuthenUserId();

            if ($this->Costs->save($cost)) {
                $costLines = $costLines['cost'];
                foreach ($costLines as $line) {
                    $costLine = $this->Costs->CostLines->newEntity();

                    $amount = $line['amount'];
                    if (is_null($amount) || $amount == '') {
                        $amount = 0;
                    }
                    $amount2 = $line['amount2'];
                    if (is_null($amount2) || $amount2 == '') {
                        $amount2 = 0;
                    }
                    $costLine->amount = $amount;
                    $costLine->amount2 = $amount2;
                    $costLine->cost_id = $cost->id;
                    $costLine->sd_weight_id = $line['sd_weight_id'];
                    $this->Costs->CostLines->save($costLine);
                }


                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The cost could not be saved. Please, try again.'));
        }

        //$weightUnittypes = $this->TransactionCode->getWeightUnittype();
        $sdWeights = $this->getSdWeightList();

        $this->set(compact('cost', 'sdWeights'));
    }

    public function edit($id = null) {
        $cost = $this->Costs->get($id, [
            'contain' => ['CostLines' => ['SdWeights']]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cost->enddate = date('Y-m-d');
            $this->Costs->save($cost);

            //New data
            /*
              $postData = $this->request->getData();

              $cost = $this->Costs->newEntity();
              $cost->branch_id = $this->Core->getLocalBranchId();
              $cost->startdate = date('Y-m-d');
              $cost->createdby = $this->Authen->getAuthenUserId();
              if ($this->Costs->save($cost)) {
              $costLines = $postData['cost'];
              foreach ($costLines as $line) {
              $costLine = $this->Costs->CostLines->newEntity();
              $costLine->amount = $line['amount'];
              $costLine->amount2 = $line['amount2'];
              $costLine->cost_id = $cost->id;
              $costLine->sd_weight_id = $line['sd_weight_id'];
              $this->Costs->CostLines->save($costLine);
              }
              return $this->redirect(['action' => 'view']);
              }
             * 
             */
            $costLines = $this->request->getData();

            $cost = $this->Costs->newEntity();
            $cost->branch_id = $this->Core->getLocalBranchId();
            $cost->startdate = date('Y-m-d');
            $cost->createdby = $this->Authen->getAuthenUserId();

            if ($this->Costs->save($cost)) {
                $costLines = $costLines['cost'];
                foreach ($costLines as $line) {
                    $costLine = $this->Costs->CostLines->newEntity();

                    $amount = $line['amount'];
                    if (is_null($amount) || $amount == '') {
                        $amount = 0;
                    }
                    $amount2 = $line['amount2'];
                    if (is_null($amount2) || $amount2 == '') {
                        $amount2 = 0;
                    }
                    $costLine->amount = $amount;
                    $costLine->amount2 = $amount2;
                    $costLine->cost_id = $cost->id;
                    $costLine->sd_weight_id = $line['sd_weight_id'];
                    $this->Costs->CostLines->save($costLine);
                }

                return $this->redirect(['action' => 'view']);
            }
        }
        $sdWeights = $this->getSdWeightList();
        $costJson = json_encode($cost);
        $this->set(compact('cost', 'sdWeights', 'costJson'));
    }

    private function getSdWeightList() {
        $q = $this->SdWeights->find()
                ->order(['seq' => 'ASC']);

        return $q->toArray();
    }

}
