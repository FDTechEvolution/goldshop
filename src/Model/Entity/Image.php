<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string $path
 * @property string $fullpath
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property string $description
 *
 * @property \App\Model\Entity\Bank[] $banks
 * @property \App\Model\Entity\ProductImage[] $product_images
 */
class Image extends Entity
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
        'type' => true,
        'path' => true,
        'fullpath' => true,
        'created' => true,
        'createdby' => true,
        'description' => true,
        'banks' => true,
        'product_images' => true
    ];
}
