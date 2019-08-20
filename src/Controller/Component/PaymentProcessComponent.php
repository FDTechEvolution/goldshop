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
class PaymentProcessComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent'];
    public $Invoices = null;
    public $InvoiceLines = null;
    public $PaymentLines = null;
    public $Payments = null;
    public $BankAccounts = null;
    public $ARDocumentCode = 'AR';
    public $PaymentMethodLines = null;

    public function createDraft($paymentDate = null, $paymentMethod = null, $bankAccountId = null, $isReceipt = 'Y', $isPartial = 'N', $org_id = null, $branch_id = null, $bpartner_id = null, $type = null,$seller= null) {
        $this->Payments = TableRegistry::get('Payments');
       //$this->log('$paymentDate','debug');
        //$this->log($paymentDate,'debug');
        $payment = $this->Payments->newEntity();
        $payment->paymentdate = $this->Util->convertDate($paymentDate);
        $docNo = '_temp';
        $payment->docno = $docNo;
        $payment->payment_method = $paymentMethod;
        $payment->org_id = $org_id;
        $payment->branch_id = $branch_id;
        $payment->bpartner_id = $bpartner_id;
        $payment->isactive = 'N';
        $payment->isreceipt = $isReceipt;
        $payment->ispartial = $isPartial;
        $payment->isprocessed = 'N';
        $payment->netamt = 0;
        $payment->vatamt = 0;
        $payment->totalamt = 0;
        $payment->outstandingamt = 0;
        $payment->type = $type;
        $payment->docstatus = 'DR';
        $payment->createdby = $this->Authen->getAuthenUserId();
        $payment->seller = $seller;
        //$this->log($payment->payment_method,'debug');
        if ($payment->payment_method == 'CASH') {
            $bankAccountId = $this->getDefaultCashBankAccount($payment->branch_id);
        }
        $payment->bank_account_id = $bankAccountId;

        $result = $this->Payments->save($payment);
        if (!$result) {
            $this->log($payment->errors(), 'debug');
        }

        return $payment;
    }

    public function createPaymentLine($payment_id = null, $invoice_id = null, $description = null, $income_type_id = null, $order_id = null,$pawn_id = null,$saving_account_id=null) {
        $this->PaymentLines = TableRegistry::get('PaymentLines');
        $line = $this->PaymentLines->newEntity();
        $line->payment_id = $payment_id;
        $line->invoice_id = $invoice_id;
        $line->order_id = $order_id;
        $line->seq = 1;
        $line->description = $description;
        $line->income_type_id = $income_type_id;
        $line->pawn_id = $pawn_id;
        $line->saving_account_id = $saving_account_id;
        $line->createdby = $this->Authen->getAuthenUserId();

        $this->PaymentLines->save($line);
    }

    public function completePayment($payment_id = null, $netamt = 0, $vatamt = 0, $totalamt = 0, $receiptamt = 0,$discount = 0,$usesavingamt = 0) {
        $this->PaymentLines = TableRegistry::get('PaymentLines');
        $payment = $this->Payments->get($payment_id);

        $docNo = $this->DocSequent->getLatestAndSave($this->ARDocumentCode);
        $payment->docno = $docNo;
        $payment->isactive = 'Y';
        $payment->isprocessed = 'Y';
        $payment->netamt = $netamt;
        $payment->vatamt = $vatamt;
        $payment->totalamt = $totalamt;
        $payment->amount = $receiptamt;
        $payment->isprocessed = 'Y';
        $payment->docstatus = 'CO';
        $payment->discount = $discount;
        $payment->usesavingamt = $usesavingamt;
        //$this->log($payment,'debug');

        $amount = $totalamt;
        if ($payment->isreceipt == 'N') {
            $amount = $amount * (-1);
        } else {
            $_receipt = $receiptamt+$discount+$usesavingamt;
            if ($_receipt < $totalamt) {
                $amount = $receiptamt;
                $outstandingamt = $totalamt - $amount;
                $payment->outstandingamt = $outstandingamt;
            }else{
                $amount = $totalamt;
                $outstandingamt = 0;
                $payment->outstandingamt = $outstandingamt;
            }
        }

        $this->Payments->save($payment);
        $this->updateBankAccountBalance($payment->bank_account_id, $amount);
    }

    private function updateBankAccountBalance($bankAccountId = null, $amount = 0) {
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $bankAccount = $this->BankAccounts->get($bankAccountId);

        $currentBalanceAmt = $bankAccount->total_balance;
        $totalBalance = $currentBalanceAmt + $amount;
        $bankAccount->total_balance = $totalBalance;
        $this->log($totalBalance, 'debug');
        $this->BankAccounts->save($bankAccount);
    }

    public function getDefaultCashBankAccount($branchId = null) {
        if ($branchId == null || $branchId == '') {
            $branchId = $this->Core->getLocalBranchId();
        }

        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $q = $this->BankAccounts->find()
                ->where(['BankAccounts.branch_id' => $branchId, 'BankAccounts.type' => 'CASH']);
        $bankAccount = $q->first();

        if (is_null($bankAccount) || $bankAccount == '') {
            $bankAccount = $this->BankAccounts->newEntity();
            $bankAccount->total_balance = 0;
            $bankAccount->account_name = 'เงินสดหน้าร้าน';
            $bankAccount->org_id = $this->Core->getLocalOrgId();
            $bankAccount->branch_id = $branchId;
            $bankAccount->type = 'CASH';
            $bankAccount->createdby = '0';
            $bankAccount->description = 'auto generate by system';
            $this->BankAccounts->save($bankAccount);
        }

        return $bankAccount->id;
    }

    public function getSavePaymentMethodLine($paymentId = null,$paymentMethod = null,$amount = 0,$description = ''){
        $this->PaymentMethodLines = TableRegistry::get('PaymentMethodLines');
        $line = $this->PaymentMethodLines->newEntity();

        $line->payment_id = $paymentId;
        $line->payment_method = $paymentMethod;
        $line->amount = $amount;
        $line->description = $description;

        if($this->PaymentMethodLines->save($line)){
          return $line;
        }else{
          $this->log($line->errors(),'debug');
          return null;
        }


    }

}
