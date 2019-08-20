<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Design Entity
 *
 * @property string $id
 * @property string $name
 * @property string $isactive
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $product_category_id
 * @property string $image_id
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class Design extends Entity
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
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'product_category_id' => true,
        'image_id' => true,
        'product_category' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
