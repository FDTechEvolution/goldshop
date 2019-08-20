<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IncomeType Entity
 *
 * @property string $id
 * @property string $name
 * @property string $isexpend
 * @property string $isrevenue
 * @property string $isactive
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 *
 * @property \App\Model\Entity\PaymentLine[] $payment_lines
 */
class IncomeType extends Entity
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
        'name' => true,
        'isexpend' => true,
        'isrevenue' => true,
        'isactive' => true,
        'created' => true,
        'createdby' => true,
        'payment_lines' => true
    ];
}
