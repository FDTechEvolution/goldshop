<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdWeight Entity
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property int $seq
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $formula
 * @property string $isdisplay
 *
 * @property \App\Model\Entity\CostLine[] $cost_lines
 * @property \App\Model\Entity\GoldPriceLine[] $gold_price_lines
 * @property \App\Model\Entity\Weight[] $weights
 */
class SdWeight extends Entity
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
        'code' => true,
        'seq' => true,
        'created' => true,
        'modified' => true,
        'formula' => true,
        'isdisplay' => true,
        'cost_lines' => true,
        'gold_price_lines' => true,
        'weights' => true
    ];
}
