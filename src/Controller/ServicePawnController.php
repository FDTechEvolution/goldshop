<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * ServicePawn Controller
 *
 *
 * @method \App\Model\Entity\ServicePawn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicePawnController extends AppController {

    public $Pawns = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();

        $this->loadComponent('Pawn');
        $this->viewBuilder()->layout('json');

        $this->Pawns = TableRegistry::get('Pawns');
    }

    public function checkDocumentno() {
        $branchId = $this->request->getQuery('branch_id');
        $documentNo = $this->request->getQuery('docno');
        $pawnId = $this->request->getQuery('pawn_id');

        $data = ['status' => 200, 'isduplicate' => true];

        if (!($branchId == '' || $documentNo == '')) {
            $where = ['branch_id' => $branchId, 'docno' => $documentNo, 'isactive' => 'Y'];
            if ($pawnId != '') {
                array_push($where, ['Pawns.id !=' => $pawnId]);
            }
            $pawn = $this->Pawns->find()
                    ->contain(['Branches'])
                    ->where($where)
                    ->first();
            if (is_null($pawn) || $pawn == '') {
                $data = ['status' => 200, 'isduplicate' => false];
            } else {
                $data = ['status' => 200, 'isduplicate' => true];
            }
            $data['branch_id'] = $branchId;
            $data['docno'] = $documentNo;
            $data['pawn'] = $pawn;
        }

        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->set(compact('json'));
    }

    public function getCalculateInterrest() {


        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');

        $startDate = $this->Util->convertDate($startDate);
        $endDate = $this->Util->convertDate($endDate);

        $rate = $this->request->getQuery('rate');
        $amount = $this->request->getQuery('amount');

        //Day diff process
        $dayDiffinterrestAmt = 0;
        $dayDiffRate = 0;
        $dayDiff = round($this->request->getQuery('daydiff'));
        if (!is_null($dayDiff) && $dayDiff != '' && $dayDiff !=0) {
            $dayDiffRate = $this->Pawn->calinterestrate($rate, $dayDiff);
            $dayDiffinterrestAmt = ($dayDiffRate / 100) * $amount;
            
            if($dayDiffinterrestAmt <20){
                $dayDiffinterrestAmt = 20;
            }
        }


        //getCalInterestRate($amount = 0,$rate = 3,$startDate=null,$endDate=null)
        $interrestAmt = $this->Pawn->getCalInterestRate($amount, $rate, $startDate, $endDate);

        $data = [
            'status' => 200,
            'interrestamt' => ($interrestAmt),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'rate' => $rate,
            'amount' => $amount,
            'day_diff' => [
                'day_diff'=>$dayDiff,
                'rate'=>$dayDiffRate,
                'interrestamt'=>$dayDiffinterrestAmt
            ]
        ];

        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->set(compact('json'));
    }

}
