<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CloseDayLine Entity
 *
 * @property string $id
 * @property string $close_day_id
 * @property string $acc_name
 * @property float $debit_amt
 * @property float $credit_amt
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $description
 * @property string $payment_method
 *
 * @property \App\Model\Entity\CloseDay $close_day
 */
class CloseDayLine extends Entity
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
        'close_day_id' => true,
        'acc_name' => true,
        'debit_amt' => true,
        'credit_amt' => true,
        'created' => true,
        'modified' => true,
        'description' => true,
        'payment_method' => true,
        'close_day' => true
    ];
}
