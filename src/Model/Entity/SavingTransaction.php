<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SavingTransaction Entity
 *
 * @property string $id
 * @property string $saving_account_id
 * @property \Cake\I18n\FrozenDate $docdate
 * @property string $docno
 * @property string $org_id
 * @property string $branch_id
 * @property float $amount
 * @property string $bank_account_id
 * @property string $isdeposit
 * @property string $isactive
 * @property string $docstatus
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $seller
 * @property string $invoice_id
 *
 * @property \App\Model\Entity\SavingAccount $saving_account
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\BankAccount $bank_account
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\User $Seller
 */
class SavingTransaction extends Entity
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
        'saving_account_id' => true,
        'docdate' => true,
        'docno' => true,
        'org_id' => true,
        'branch_id' => true,
        'amount' => true,
        'bank_account_id' => true,
        'isdeposit' => true,
        'isactive' => true,
        'docstatus' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'seller' => true,
        'invoice_id' => true,
        'saving_account' => true,
        'org' => true,
        'branch' => true,
        'bank_account' => true,
        'invoice' => true,
        'Seller' => true
    ];
}
