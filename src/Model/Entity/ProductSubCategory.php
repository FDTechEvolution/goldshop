<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductSubCategory Entity
 *
 * @property string $id
 * @property string $name
 * @property string $isactive
 * @property string $product_category_id
 * @property string $org_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $code
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Product[] $products
 */
class ProductSubCategory extends Entity
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
        'product_category_id' => true,
        'org_id' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'code' => true,
        'product_category' => true,
        'org' => true,
        'products' => true
    ];
}
