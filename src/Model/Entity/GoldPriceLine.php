<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoldPriceLine Entity
 *
 * @property string $id
 * @property float $sales_price
 * @property float $purchase_price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $gold_price_id
 * @property string $sd_weight_id
 *
 * @property \App\Model\Entity\GoldPrice $gold_price
 * @property \App\Model\Entity\SdWeight $sd_weight
 */
class GoldPriceLine extends Entity
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
        'sales_price' => true,
        'purchase_price' => true,
        'created' => true,
        'modified' => true,
        'gold_price_id' => true,
        'sd_weight_id' => true,
        'gold_price' => true,
        'sd_weight' => true
    ];
}
