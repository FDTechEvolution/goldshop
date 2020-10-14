<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class MakePaymentComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent','Financial'];
    public $Invoices = null;
    public $InvoiceLines = null;
    public $PaymentLines = null;
    public $Payments = null;
    public $BankAccounts = null;
    public $ARDocumentCode = 'AR';
    public $PaymentMethodLines = null;

    public function getSaveDraft($paymentDate = null, $paymentMethod = null, $bankAccountId = null, $bpartnerId = null, $isReceipt = 'Y', $warehouseId = null, $type = null, $seller = null,$time = null) {
        $this->Payments = TableRegistry::get('Payments');

        $payment = $this->Payments->newEntity();
        if(is_null($paymentDate) || $paymentDate ==''){
            $payment->paymentdate = new Date();
        }else{
            $payment->paymentdate = $this->Util->convertDate($paymentDate);
        }
        
        $docNo = '_temp';
        $payment->docno = $docNo;

        $payment->branch_id = $this->Core->getLocalBranchId();
        $payment->bpartner_id = $bpartnerId;
        $payment->isactive = 'N';
        $payment->isreceipt = $isReceipt;
        $payment->warehouse_id = $warehouseId;
        $payment->amount = 0;
        $payment->discount = 0;
        $payment->usesavingamt = 0;
        $payment->totalamt = 0;
        $payment->isprocessed = 'N';
        $payment->type = $type;
        $payment->docstatus = 'DR';
        $payment->createdby = $this->Authen->getAuthenUserId();
        $payment->seller = $seller;
        
        

        if (is_array($paymentMethod)) {
            $payment->payment_method = 'MULTIPLE';
            $payment->bank_account_id = null;
        } else {
            $payment->payment_method = $paymentMethod;
            if ($paymentMethod == 'CASH') {
                $bankAccountId = $this->getDefaultCashBankAccount($payment->branch_id);
            }

            $payment->bank_account_id = $bankAccountId;
        }

        $result = $this->Payments->save($payment);
        if (!$result) {
            $this->log($payment->errors(), 'debug');
        } else {
            if (is_array($paymentMethod)) {

                //getSavePaymentMethodLine($paymentId = null,$paymentMethod = null,$bankAccountId = null,$amount = 0,$description = '')
                foreach ($paymentMethod as $item) {
                    $bankAccountId = $item['bank_account_id'];
                    if ($item['payment_method'] == 'CASH') {
                        $bankAccountId = $this->getDefaultCashBankAccount($payment->branch_id);
                    }
                    $this->getSavePaymentMethodLine($payment->id, $item['payment_method'], $bankAccountId, $item['amount']);
                }
            } else {
                $this->getSavePaymentMethodLine($payment->id, $paymentMethod, $bankAccountId, 0);
            }
        }
        
        if($time != null){
            $strTime = sprintf('%s %s',$payment->paymentdate,$time);
            $now = new Time($strTime);
            $payment->created = $now;
            $payment = $this->Payments->save($payment);
        }

        return $payment;
    }

    public function getSavePaymentLine($payment_id = null, $seq = 1, $description = null, $order_id = null, $pawn_id = null, $saving_account_id = null, $productId = null, $amount = 0, $qty = 1, $isExchange = 'N', $incomeTypeId = null, $isOverPrice = 'N',$exchangeamt = 0) {
        $this->PaymentLines = TableRegistry::get('PaymentLines');
        $line = $this->PaymentLines->newEntity();

        $line->payment_id = $payment_id;
        $line->seq = $seq;
        $line->description = $description;
        $line->order_id = $order_id;
        $line->pawn_id = $pawn_id;
        $line->saving_account_id = $saving_account_id;
        $line->income_type_id = $incomeTypeId;
        $line->product_id = $productId;
        $line->createdby = $this->Authen->getAuthenUserId();
        $line->amount = $amount;
        $line->qty = $qty;
        $line->totalamount = ($amount * $qty);
        $line->isexchange = $isExchange;
        $line->isoverprice = $isOverPrice;
        $line->exchangamt = $exchangeamt;

        if ($this->PaymentLines->save($line)) {
            return $line;
        } else {
            $this->log('getSavePaymentLine', 'debug');
            $this->log($line->errors(), 'debug');
            return null;
        }
    }

    public function completedPayment($payment = null, $documentCode = null, $amount = 0, $discount = 0, $usesavingamt = 0, $totalAmount = 0, $refPayment = null, $isExchange = 'N') {
        $this->PaymentLines = TableRegistry::get('PaymentLines');
        //$payment = $this->Payments->get($payment_id);

        $docNo = $this->DocSequent->getLatestAndSave($documentCode);
        $payment->docno = $docNo;
        $payment->isactive = 'Y';
        $payment->isprocessed = 'Y';
        $payment->amount = $amount;
        $payment->discount = $discount;
        $payment->usesavingamt = $usesavingamt;
        $payment->totalamt = $totalAmount;
        $payment->isprocessed = 'Y';
        $payment->docstatus = 'CO';
        $payment->payment_ref = $refPayment;
        $payment->isexchange = $isExchange;

        if ($payment->isreceipt == 'N') {
            $totalAmount = $totalAmount * (-1);
        }

        $this->Payments->save($payment);
        if ($payment->payment_method == 'MULTIPLE') {
            $q = $this->Payments->find()
                    ->contain(['PaymentMethodLines'])
                    ->where(['Payments.id' => $payment->id]);
            $payment = $q->first();
            /*
            foreach ($payment->payment_method_lines as $item) {
                $this->updateBankAccountBalance($item->bank_account_id, $item->amount);
            }
             * 
             */
        } else {
            $q = $this->PaymentMethodLines->find()
                    ->where(['payment_id' => $payment->id]);
            $paymentMethodLine = $q->first();
            $paymentMethodLine->amount = ($amount - $usesavingamt-$discount);
            $this->PaymentMethodLines->save($paymentMethodLine);
            //$this->updateBankAccountBalance($payment->bank_account_id, $totalAmount);
        }
        $this->Financial->complete($payment->id);
        return $payment;
    }

    /*
    private function updateBankAccountBalance($bankAccountId = null, $amount = 0) {
        $this->BankAccounts = TableRegistry::get('BankAccounts');
        $bankAccount = $this->BankAccounts->get($bankAccountId);

        $currentBalanceAmt = $bankAccount->total_balance;
        $totalBalance = $currentBalanceAmt + $amount;
        $bankAccount->total_balance = $totalBalance;
        //$this->log($totalBalance, 'debug');
        $this->BankAccounts->save($bankAccount);
    }
     * 
     */

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

    public function getSavePaymentMethodLine($paymentId = null, $paymentMethod = null, $bankAccountId = null, $amount = 0, $description = '') {
        $this->PaymentMethodLines = TableRegistry::get('PaymentMethodLines');
        $line = $this->PaymentMethodLines->newEntity();



        $line->payment_id = $paymentId;
        $line->payment_method = $paymentMethod;
        $line->amount = $amount;
        $line->description = $description;
        $line->bank_account_id = $bankAccountId;

        if ($this->PaymentMethodLines->save($line)) {
            return $line;
        } else {
            $this->log($line->errors(), 'debug');
            return null;
        }
    }

    public function void($paymentId = null) {
        if (!is_null($paymentId)) {
            $this->Payments = TableRegistry::get('Payments');
            $q = $this->Payments->find()
                    ->contain(['PaymentMethodLines'])
                    ->where(['Payments.id' => $paymentId]);
            if (sizeof($q->toArray()) > 0) {
                $payment = $q->first();
                $isReceipt = $payment->isreceipt;
                $payment->docstatus = 'VO';
                $payment->modifiedby = $this->Authen->getAuthenUserId();
                $this->Payments->save($payment);
                
                $this->Financial->void($payment->id);
                
                /*
                foreach ($payment->payment_method_lines as $item) {
                    $amount = $item->amount;
                    if ($isReceipt == 'Y') {
                        $amount = $amount * -1;
                    }
                    $this->updateBankAccountBalance($item->bank_account_id, $amount);
                }
                 * 
                 */
            }
        }
    }

    public function unvoid($paymentId = null) {
        if (!is_null($paymentId)) {
            $this->Payments = TableRegistry::get('Payments');
            $payment = $this->Payments->find()
                    ->contain(['PaymentMethodLines'])
                    ->where(['Payments.id' => $paymentId])
                    ->first();

            $payment->docstatus = 'CO';
            $payment->modifiedby = $this->Authen->getAuthenUserId();
            $this->Payments->save($payment);

        }
    }

}
