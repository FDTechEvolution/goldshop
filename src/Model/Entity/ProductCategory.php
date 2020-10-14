<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductCategory Entity
 *
 * @property string $id
 * @property string $name
 * @property string $isactive
 * @property string $org_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $code
 * @property string $isdefault
 * @property string $type
 * @property string $isstock
 * @property string $unittype
 * @property string $label
 * @property string $runningno
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Design[] $designs
 * @property \App\Model\Entity\ProductSubCategory[] $product_sub_categories
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Size[] $sizes
 * @property \App\Model\Entity\Weight[] $weights
 */
class ProductCategory extends Entity
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
        'org_id' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'code' => true,
        'isdefault' => true,
        'type' => true,
        'isstock' => true,
        'unittype' => true,
        'label' => true,
        'runningno' => true,
        'org' => true,
        'designs' => true,
        'product_sub_categories' => true,
        'products' => true,
        'sizes' => true,
        'weights' => true
    ];
}
