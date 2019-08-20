<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductImage Entity
 *
 * @property string $id
 * @property string $product_id
 * @property string $image_id
 * @property int $seq
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property string $description
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Image $image
 */
class ProductImage extends Entity
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
        'product_id' => true,
        'image_id' => true,
        'seq' => true,
        'created' => true,
        'createdby' => true,
        'description' => true,
        'modified' => true,
        'modifiedby' => true,
        'product' => true,
        'image' => true
    ];
}
