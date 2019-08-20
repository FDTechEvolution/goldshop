<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pawn Entity
 *
 * @property string $id
 * @property string $org_id
 * @property string $branch_id
 * @property string $bpartner_id
 * @property string $bank_account_id
 * @property \Cake\I18n\FrozenDate $docdate
 * @property string $docno
 * @property \Cake\I18n\FrozenDate $expiredate
 * @property \Cake\I18n\FrozenDate $returndate
 * @property string $status
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $cratedby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property float $totalmoney
 * @property float $rate
 * @property string $type
 * @property float $interrestrate
 * @property string $log_history
 * @property string $seller
 * @property string $warehouse_id
 * @property string $isoverprice
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Bpartner $bpartner
 * @property \App\Model\Entity\BankAccount $bank_account
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\PawnLine[] $pawn_lines
 * @property \App\Model\Entity\PawnTransaction[] $pawn_transactions
 * @property \App\Model\Entity\PaymentLine[] $payment_lines
 * @property \App\Model\Entity\User $Seller
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class Pawn extends Entity
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
        'org_id' => true,
        'branch_id' => true,
        'bpartner_id' => true,
        'bank_account_id' => true,
        'docdate' => true,
        'docno' => true,
        'expiredate' => true,
        'returndate' => true,
        'status' => true,
        'description' => true,
        'created' => true,
        'cratedby' => true,
        'modified' => true,
        'modifiedby' => true,
        'totalmoney' => true,
        'rate' => true,
        'type' => true,
        'interrestrate' => true,
        'log_history' => true,
        'seller' => true,
        'warehouse_id' => true,
        'isoverprice' => true,
        'org' => true,
        'branch' => true,
        'bpartner' => true,
        'bank_account' => true,
        'warehouse' => true,
        'pawn_lines' => true,
        'pawn_transactions' => true,
        'payment_lines' => true,
        'Seller' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
