<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PawnLine Entity
 *
 * @property string $id
 * @property int $seq
 * @property string $product_id
 * @property string $description
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $pawn_id
 * @property float $weight
 * @property string $image_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Pawn $pawn
 * @property \App\Model\Entity\Image $image
 */
class PawnLine extends Entity
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
        'seq' => true,
        'product_id' => true,
        'description' => true,
        'amount' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'pawn_id' => true,
        'weight' => true,
        'image_id' => true,
        'product' => true,
        'pawn' => true,
        'image' => true
    ];
}
