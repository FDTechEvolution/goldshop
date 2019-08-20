<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Weight Entity
 *
 * @property string $id
 * @property string $name
 * @property string $isactive
 * @property string $description
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $product_category_id
 * @property float $value
 * @property string $sd_weight_id
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class Weight extends Entity
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
        'isactive' => true,
        'description' => true,
        'createdby' => true,
        'created' => true,
        'modified' => true,
        'modifiedby' => true,
        'product_category_id' => true,
        'value' => true,
        'sd_weight_id' => true,
        'product_category' => true,
        'products' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
