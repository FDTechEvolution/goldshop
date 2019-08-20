<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoldPrice Entity
 *
 * @property string $id
 * @property string $branch_id
 * @property \Cake\I18n\FrozenDate $pricedate
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $master_price_id
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\MasterPrice $master_price
 * @property \App\Model\Entity\GoldPriceLine[] $gold_price_lines
 */
class GoldPrice extends Entity
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
        'pricedate' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'master_price_id' => true,
        'branch' => true,
        'master_price' => true,
        'gold_price_lines' => true
    ];
}
