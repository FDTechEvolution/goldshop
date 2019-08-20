<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankAccount Entity
 *
 * @property string $id
 * @property float $total_balance
 * @property string $account_name
 * @property string $bank_id
 * @property string $account_type
 * @property string $accountno
 * @property string $bank_office
 * @property string $org_id
 * @property string $branch_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $type
 *
 * @property \App\Model\Entity\Bank $bank
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Pawn[] $pawns
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\SavingTransaction[] $saving_transactions
 */
class BankAccount extends Entity
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
        'total_balance' => true,
        'account_name' => true,
        'bank_id' => true,
        'account_type' => true,
        'accountno' => true,
        'bank_office' => true,
        'org_id' => true,
        'branch_id' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'type' => true,
        'bank' => true,
        'org' => true,
        'branch' => true,
        'pawns' => true,
        'payments' => true,
        'saving_transactions' => true
    ];
}
