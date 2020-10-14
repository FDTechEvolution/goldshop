<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * PawnTransactions Controller
 *
 * @property \App\Model\Table\PawnTransactionsTable $PawnTransactions
 *
 * @method \App\Model\Entity\PawnTransaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PawnTransactionsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->loadComponent('Pawn');
        $this->loadComponent('MakePayment');



        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function void($id = null) {
        $pawnTransaction = $this->PawnTransactions->find()
                ->contain(['Pawns', 'Payments'])
                ->where(['PawnTransactions.id' => $id])
                ->first();
        $pawnId = $pawnTransaction['pawn_id'];

        if (!is_null($pawnTransaction)) {
            //void payment
            $paymentId = $pawnTransaction['payment_id'];
            if ($paymentId != null && $paymentId != '') {
                $this->MakePayment->void($paymentId);
            }

            //revert pawn to before transaction
            $pawnTransactionBefore = $this->PawnTransactions->find()
                    ->where(['pawn_id' => $pawnId, 'id !=' => $pawnTransaction->id, 'type !=' => 'VO'])
                    ->order(['created' => 'DESC'])
                    ->first();
            // $this->log($pawnTransactionBefore,'debug');
            $pawn = $this->PawnTransactions->Pawns->find()->where(['Pawns.id' => $pawnId])->first();
            if ($pawnTransaction->type == 'RN') {
                $pawn->status = $pawnTransactionBefore->type == 'NEW' ? 'CO' : $pawnTransactionBefore->type;
                if (!is_null($pawnTransaction->start_date) && $pawnTransaction->start_date != '') {
                    $pawn->expiredate = $pawnTransaction->start_date->modify('+4 months');
                }

                $this->PawnTransactions->Pawns->save($pawn);
            } else if ($pawnTransaction->type == 'RF') {
                $pawn->status = $pawnTransactionBefore->type == 'NEW' ? 'CO' : $pawnTransactionBefore->type;
                if ($pawnTransactionBefore->type == 'NEW') {
                    if (!is_null($pawnTransactionBefore->start_date) && $pawnTransactionBefore->start_date != '') {
                        $pawn->startdate = $pawnTransactionBefore->start_date;
                        $pawn->expiredate = $pawnTransactionBefore->start_date->modify('+4 months');
                    }
                } else {
                    if (!is_null($pawnTransaction->end_date) && $pawnTransaction->end_date != '') {
                        $pawn->startdate = $pawnTransactionBefore->end_date;
                        $pawn->expiredate = $pawnTransactionBefore->end_date->modify('+4 months');
                    }
                }


                $this->PawnTransactions->Pawns->save($pawn);
            }

            //void this transaction
            $pawnTransaction->type = 'VO';
            $this->PawnTransactions->save($pawnTransaction);
            /*
              $pawnTransactionBefore = $this->PawnTransactions->find()
              ->where(['pawn_id'=>$pawnId])
              ->order(['created'=>'DESC'])
              ->first();
              if(!is_null($pawnTransactionBefore)){
              $pawn = $this->PawnTransactions->Pawns->find()->where(['Pawns.id'=>$pawnId])->first();
              $pawn->status = $pawnTransactionBefore->status;

              }
             * 
             */



            return $this->redirect(['controller' => 'pawns', 'action' => 'view', $pawnId]);
        } else {
            return $this->redirect(['controller' => 'pawns', 'action' => 'listpawn']);
        }
    }

}
