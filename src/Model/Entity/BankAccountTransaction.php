<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankAccountTransaction Entity
 *
 * @property string $id
 * @property string $type
 * @property string $payment_id
 * @property string $bank_account_id
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $description
 * @property string $payment_method_line_id
 * @property float $debit
 * @property float $credit
 *
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\BankAccount $bank_account
 * @property \App\Model\Entity\PaymentMethodLine $payment_method_line
 */
class BankAccountTransaction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'type' => true,
        'payment_id' => true,
        'bank_account_id' => true,
        'amount' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'description' => true,
        'payment_method_line_id' => true,
        'debit' => true,
        'credit' => true,
        'payment' => true,
        'bank_account' => true,
        'payment_method_line' => true
    ];
}
