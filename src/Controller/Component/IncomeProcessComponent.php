<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class IncomeProcessComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'MakePayment'];
    public $Payments = null;
    public $Users = null;
    public $IncomeTypes = null;
    public $BankAccounts = null;

    // Save and return EXPEND type
    public function getSaveExpend($docdate = null,$payment_method = null,$income_type_id = null, $bank_account_id = null,$seller = null, $amount = 0,$description = null) {
        $payment = $this->save($docdate, $payment_method, $income_type_id, $bank_account_id, $seller, $amount, $description, 'N', 'EXPEND');
        return $payment;
    }

    public function getSaveRevenue($docdate = null,$payment_method = null,$income_type_id = null, $bank_account_id = null,$seller = null, $amount = 0,$description = null) {
        $payment = $this->save($docdate, $payment_method, $income_type_id, $bank_account_id, $seller, $amount, $description, 'Y', 'REVENUE');
        return $payment;
    }
    
    public function void($id = null){
        $this->MakePayment->void($id);
    }


    private function save($docdate = null,$payment_method = null,$income_type_id = null, $bank_account_id = null,$seller = null, $amount = 0,$description = null,$isreceipt = 'N',$type = 'EXPEND'){
        $this->Payments = TableRegistry::get('Payments');
        //$this->log($income_type_id,'debug');
        //getSaveDraft($paymentDate = null,$paymentMethod = null, $bankAccountId = null, $bpartnerId = null, $isReceipt = 'Y',$warehouseId = null, $type = null,$seller= null)
        $payment = $this->MakePayment->getSaveDraft($docdate, $payment_method, $bank_account_id,null, $isreceipt, null,$type, $seller);

        //Payment Line
        //getSavePaymentLine($payment_id = null,$seq = 1, $description = null, $order_id = null,$pawn_id = null,$saving_account_id=null,$productId = null,$amount =0,$qty=1,$isExchange = 'N')
        $this->MakePayment->getSavePaymentLine($payment->id,1, null, null,null,null,null,$amount,1,'N',$income_type_id);
        //completedPayment($payment = null,$documentCode = null,$amount =0,$discount = 0,$usesavingamt = 0,$totalAmount = 0)
        $payment = $this->MakePayment->completedPayment($payment,($isreceipt=='Y'?'AR':'AP'), $amount, 0, 0,$amount);

        return $payment;
    }

}
