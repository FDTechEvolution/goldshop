<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CostLine Entity
 *
 * @property string $id
 * @property float $amount
 * @property float $amount2
 * @property string $cost_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $sd_weight_id
 *
 * @property \App\Model\Entity\Cost $cost
 * @property \App\Model\Entity\SdWeight $sd_weight
 */
class CostLine extends Entity
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
        'amount' => true,
        'amount2' => true,
        'cost_id' => true,
        'created' => true,
        'modified' => true,
        'sd_weight_id' => true,
        'cost' => true,
        'sd_weight' => true
    ];
}
