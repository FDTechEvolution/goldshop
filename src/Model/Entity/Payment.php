<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $paymentdate
 * @property string $docno
 * @property string $payment_method
 * @property string $bank_account_id
 * @property string $org_id
 * @property string $branch_id
 * @property string $bpartner_id
 * @property string $isactive
 * @property string $isreceipt
 * @property string $ispartial
 * @property string $isprocessed
 * @property float $netamt
 * @property float $vatamt
 * @property float $totalamt
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $seller
 * @property string $type
 * @property float $amount
 * @property string $docstatus
 * @property float $outstandingamt
 * @property float $discount
 * @property float $usesavingamt
 * @property string $warehouse_id
 * @property string $isexchange
 * @property string $payment_ref
 *
 * @property \App\Model\Entity\BankAccount $bank_account
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Bpartner $bpartner
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\PaymentLine[] $payment_lines
 * @property \App\Model\Entity\PaymentMethodLine[] $payment_method_lines
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 * @property \App\Model\Entity\User $Seller
 * @property \App\Model\Entity\Payment $PaymentRef
 */
class Payment extends Entity
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
        'paymentdate' => true,
        'docno' => true,
        'payment_method' => true,
        'bank_account_id' => true,
        'org_id' => true,
        'branch_id' => true,
        'bpartner_id' => true,
        'isactive' => true,
        'isreceipt' => true,
        'ispartial' => true,
        'isprocessed' => true,
        'netamt' => true,
        'vatamt' => true,
        'totalamt' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'seller' => true,
        'type' => true,
        'amount' => true,
        'docstatus' => true,
        'outstandingamt' => true,
        'discount' => true,
        'usesavingamt' => true,
        'warehouse_id' => true,
        'isexchange' => true,
        'payment_ref' => true,
        'bank_account' => true,
        'org' => true,
        'branch' => true,
        'bpartner' => true,
        'warehouse' => true,
        'payment_lines' => true,
        'payment_method_lines' => true,
        'UserCreated' => true,
        'UserModified' => true,
        'Seller' => true,
        'PaymentRef' => true
    ];
}
