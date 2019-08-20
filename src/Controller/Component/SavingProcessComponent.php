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
class SavingProcessComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent', 'PaymentProcess'];
    public $SavingAccounts = null;
    public $SavingTransactions = null;

    public function getSaveTransaction($bpartnerId = null, $bank_account_id = null, $docdate = null,
$isDeposit = 'Y', $amount = 0, $description = null,$invoice_id = null,$seller = null) {

        $this->SavingAccounts = TableRegistry::get('SavingAccounts');
        $this->SavingTransactions = TableRegistry::get('SavingTransactions');
        
        //Find account
        $q = $this->SavingAccounts->find()
                ->where(['SavingAccounts.bpartner_id'=>$bpartnerId]);
        if(sizeof($q->toArray()) <=0){
            return null;
        }
        
        if(is_null($bank_account_id)){
            $bank_account_id = $this->PaymentProcess->getDefaultCashBankAccount($this->Core->getLocalBranchId());
        }
        
        $savingAccount = $q->first();

        $savingTransaction = $this->SavingTransactions->newEntity();
        $savingTransaction->saving_account_id = $savingAccount->id;
        $savingTransaction->org_id = $this->Core->getLocalOrgId();
        $savingTransaction->branch_id = $this->Core->getLocalBranchId();
        $savingTransaction->bank_account_id = $bank_account_id;
        $savingTransaction->createdby = $this->Authen->getAuthenUserId();
        $savingTransaction->docdate = $this->Util->convertDate($docdate);
        $savingTransaction->docstatus = 'DR';
        $savingTransaction->seller = $seller;
        if($isDeposit =='Y'){
            $savingTransaction->docno = $this->DocSequent->getLatestAndSave('DP');
        }else{
            $savingTransaction->docno = $this->DocSequent->getLatestAndSave('WD');
        }
        
        $savingTransaction->isdeposit = $isDeposit;
        $savingTransaction->amount = $amount;
        $savingTransaction->description = $description;
        $savingTransaction->invoice_id = $invoice_id;
        
        $this->SavingTransactions->save($savingTransaction);
        if($isDeposit =='Y'){
            $this->updateBalance($savingAccount->id, $amount, true);
        }else{
            $this->updateBalance($savingAccount->id, $amount, false);
        }
        
        return $savingTransaction;
    }

    private function updateBalance($savingAccountId = null, $amount = 0, $isDeposit = true) {
        $this->SavingAccounts = TableRegistry::get('SavingAccounts');

        $savingAccount = $this->SavingAccounts->get($savingAccountId);
        $currentBalance = $savingAccount->balanceamt;

        if ($isDeposit) {
            $savingAccount->balanceamt = ($currentBalance + $amount);
        } else {
            $savingAccount->balanceamt = ($currentBalance - $amount);
        }
        
        //$this->log($savingAccount,'debug');
        
        if(!$this->SavingAccounts->save($savingAccount)){
            $this->log($savingAccount->errors(),'debug');
        }
    }
    
    

}
