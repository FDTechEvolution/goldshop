<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BpUsePromotion Entity
 *
 * @property string $id
 * @property string $bpartner_id
 * @property string $branch_id
 * @property string $seller
 * @property string $promotion_id
 * @property float $value
 * @property \Cake\I18n\FrozenTime $usedate
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $createdby
 *
 * @property \App\Model\Entity\Bpartner $bpartner
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Promotion $promotion
 */
class BpUsePromotion extends Entity
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
        'bpartner_id' => true,
        'branch_id' => true,
        'seller' => true,
        'promotion_id' => true,
        'value' => true,
        'usedate' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'bpartner' => true,
        'branch' => true,
        'promotion' => true
    ];
}
