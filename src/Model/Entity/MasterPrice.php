<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterPrice Entity
 *
 * @property string $id
 * @property string $title
 * @property \Cake\I18n\FrozenTime $publish_datetime
 * @property float $gold_bar_purchase_price
 * @property float $gold_bar_sales_price
 * @property float $gold_purchase_price
 * @property float $gold_sales_price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $description
 */
class MasterPrice extends Entity
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
        'title' => true,
        'publish_datetime' => true,
        'gold_bar_purchase_price' => true,
        'gold_bar_sales_price' => true,
        'gold_purchase_price' => true,
        'gold_sales_price' => true,
        'created' => true,
        'modified' => true,
        'description' => true
    ];
}
