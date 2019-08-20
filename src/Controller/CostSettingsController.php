<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\ORM\TableRegistry;

/**
 * CostSettings Controller
 *
 *
 * @method \App\Model\Entity\CostSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CostSettingsController extends AppController {

    public $Costs = null;
    public $SdWeights = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Costs = TableRegistry::get('Costs');
        $this->SdWeights = TableRegistry::get('SdWeights');
    }
    
    public function view($type = 'NORMAL'){
        $type = strtoupper($type);
        $cost = $this->getByType($type);
        $costTypes = $this->TransactionCode->getCostType();
       //$title = $costTypes[$type];
        
        $this->set(compact('cost','type'));
    }

    private function getByType($type = 'NORMAL') {
        $type = strtoupper($type);
        $q = $this->Costs->find()
                ->contain(['Branches', 'CostLines' => ['SdWeights', 'sort' => ['SdWeights.seq' => 'ASC']]])
                ->where([
                    'enddate IS' => NULL,
                    'OR' => [['Costs.branch_id' => $this->Core->getLocalBranchId()], ['Costs.branch_id' => '0']],
                    'Costs.org_id' => $this->Core->getLocalOrgId(),
                    'Costs.type' => $type
                ])
                ->order(['Costs.startdate' => 'DESC', 'Costs.created' => 'DESC'])
                ->limit(1);
        $cost = $q->first();
        if (is_null($cost)) {
            $this->createDraf($type, $this->Core->getLocalBranchId());
            $this->getByType($type);
        }
        //$this->log($cost,'debug');
        return $cost;
        
    }

    public function edit($id = null) {

        $cost = $this->Costs->get($id, [
            'contain' => ['CostLines' => ['SdWeights']]
        ]);
        $type = $cost->type;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cost->enddate = date('Y-m-d');
            $this->Costs->save($cost);

            $costLines = $this->request->getData();

            $cost = $this->Costs->newEntity();
            $cost->branch_id = $this->Core->getLocalBranchId();
            $cost->org_id = $this->Core->getLocalOrgId();
            $cost->startdate = date('Y-m-d');
            $cost->createdby = $this->Authen->getAuthenUserId();
            $cost->type = $type;

            if ($this->Costs->save($cost)) {
                $costLines = $costLines['cost'];
                foreach ($costLines as $line) {
                    $costLine = $this->Costs->CostLines->newEntity();

                    $amount = $line['amount'];
                    if (is_null($amount) || $amount == '') {
                        $amount = 0;
                    }
                    $amount2 = isset($line['amount2'])?$line['amount2']:0;
                    if (is_null($amount2) || $amount2 == '') {
                        $amount2 = 0;
                    }
                    $costLine->amount = $amount;
                    $costLine->amount2 = $amount2;
                    $costLine->cost_id = $cost->id;
                    $costLine->sd_weight_id = $line['sd_weight_id'];
                    $this->Costs->CostLines->save($costLine);
                }

                return $this->redirect(['action' => 'view',$cost->type]);
            }
        }
        $sdWeights = $this->getSdWeightList();
        $costJson = json_encode($cost);
        $this->set(compact('cost', 'sdWeights', 'costJson'));
    }

    private function createDraf($type = 'NORMAL', $branchId = '0') {
        $cost = $this->Costs->newEntity();
        $data = [
            'branch_id' => $branchId,
            'org_id' => $this->Core->getLocalOrgId(),
            'createdby' => '',
            'startdate' => date('Y-m-d'),
            'type' => $type
        ];
        $cost = $this->Costs->patchEntity($cost, $data);
        $this->Costs->save($cost);

        $sdWeights = $this->getSdWeightList();
        foreach ($sdWeights as $item) {
            $costLine = $this->Costs->CostLines->newEntity();

            $lineData = [
                'amount' => 0,
                'amount2' => 0,
                'cost_id' => $cost->id,
                'sd_weight_id' => $item->id
            ];
            $costLine = $this->Costs->CostLines->patchEntity($costLine, $lineData);
            if(!$this->Costs->CostLines->save($costLine)){
                $this->log($costLine->errors(),'debug');
            }
        }
    }

    private function getSdWeightList() {
        $q = $this->SdWeights->find()
                ->order(['seq' => 'ASC']);

        return $q->toArray();
    }

}
