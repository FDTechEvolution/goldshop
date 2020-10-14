<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoodsLine Entity
 *
 * @property string $id
 * @property int $seq
 * @property string $product_id
 * @property int $qty
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $goods_transaction_id
 * @property string $order_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\GoodsTransaction $goods_transaction
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class GoodsLine extends Entity
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
        'qty' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'goods_transaction_id' => true,
        'order_id' => true,
        'product' => true,
        'goods_transaction' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
