<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class FinancialComponent extends Component {

    public $components = ['Core', 'Util', 'Authen', 'DocSequent'];
    public $Payments = null;
    public $BankAccounts = null;
    public $BankAccountTransactions = null;
    public $TransactionTypeCode = [
        'SALESCO' => '',
        'SALSEVO' => '',
        'PURCHASECO' => '',
        'PURCHASEVO' => '',
        'PAWNCO' => '',
        'PAWNVO' => '',
    ];

    private function setModel() {
        $this->Payments = TableRegistry::get('Payments');
        $this->BankAccountTransactions = TableRegistry::get('BankAccountTransactions');
        $this->BankAccounts = TableRegistry::get('BankAccounts');
    }

    private function createAccTransaction($type = NULL, $paymentId = null, $bankAccountId = null, $amount = 0, $debit = 0, $credit = 0, $paymentMethodId = null, $description = NULL) {
        $bankAccountTransaction = $this->BankAccountTransactions->newEntity();
        $bankAccountTransaction->type = $type;
        $bankAccountTransaction->payment_id = $paymentId;
        $bankAccountTransaction->bank_account_id = $bankAccountId;
        $bankAccountTransaction->amount = $amount;
        $bankAccountTransaction->debit = $debit;
        $bankAccountTransaction->credit = $credit;
        $bankAccountTransaction->payment_method_line_id = $paymentMethodId;
        $bankAccountTransaction->description = $description;

        if ($this->BankAccountTransactions->save($bankAccountTransaction)) {
            $this->updateBankAccountBalance($bankAccountId, $debit, $credit);
        }
    }

    public function complete($paymentId = null) {
        if (is_null($paymentId)) {
            return false;
        }
        $this->setModel();

        $payment = $this->Payments->find()
                ->contain(['PaymentLines' => ['Products'], 'PaymentMethodLines'])
                ->where(['Payments.id' => $paymentId])
                ->first();
        $paymentMethodLines = $payment->payment_method_lines;

        $type = $payment->type . 'CO';
        foreach ($paymentMethodLines as $paymentMethodLine) {
            $debit = 0;
            $credit = 0;
            if ($payment->isreceipt == 'N') {
                $credit = $paymentMethodLine->amount;
            } else {
                $debit = $paymentMethodLine->amount;
            }

            $this->createAccTransaction($type, $paymentId, $paymentMethodLine->bank_account_id, $paymentMethodLine->amount,$debit,$credit, $paymentMethodLine->id);
        }
    }

    public function void($paymentId = null) {
        if (is_null($paymentId)) {
            return false;
        }
        $this->setModel();

        $payment = $this->Payments->find()
                ->contain(['PaymentLines' => ['Products'], 'PaymentMethodLines'])
                ->where(['Payments.id' => $paymentId])
                ->first();
        $paymentMethodLines = $payment->payment_method_lines;
        $type = $payment->type . 'VO';
        foreach ($paymentMethodLines as $paymentMethodLine) {
            $debit = 0;
            $credit = 0;
            if ($payment->isreceipt == 'Y') {
                $credit = $paymentMethodLine->amount;
            } else {
                $debit = $paymentMethodLine->amount;
            }
            
            $this->createAccTransaction($type, $paymentId, $paymentMethodLine->bank_account_id, $paymentMethodLine->amount,$debit,$credit, $paymentMethodLine->id);
            
            
        }
    }
    
    private function updateBankAccountBalance($bankAccountId = null, $debit=0,$credit=0) {
        $bankAccount = $this->BankAccounts->get($bankAccountId);
        $currentBalanceAmt = $bankAccount->total_balance;
        $totalBalance = $currentBalanceAmt + ($debit+$credit);
        $bankAccount->total_balance = $totalBalance;
        $this->BankAccounts->save($bankAccount);
    }

}
