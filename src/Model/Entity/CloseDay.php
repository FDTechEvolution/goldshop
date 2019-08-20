<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CloseDay Entity
 *
 * @property string $id
 * @property string $branch_id
 * @property \Cake\I18n\FrozenDate $close_date
 * @property float $actual_amt
 * @property float $actual_manual_amt
 * @property float $receipt_amt
 * @property float $paid_amt
 * @property float $paid_cash_amt
 * @property float $receipt_cash_amt
 * @property float $transfer_receipt_amt
 * @property float $transfer_paid_amt
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $createdby
 * @property string $modifiedby
 * @property string $status
 * @property string $description
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\CloseDayLine[] $close_day_lines
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class CloseDay extends Entity
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
        'branch_id' => true,
        'close_date' => true,
        'actual_amt' => true,
        'actual_manual_amt' => true,
        'receipt_amt' => true,
        'paid_amt' => true,
        'paid_cash_amt' => true,
        'receipt_cash_amt' => true,
        'transfer_receipt_amt' => true,
        'transfer_paid_amt' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'status' => true,
        'description' => true,
        'branch' => true,
        'close_day_lines' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
