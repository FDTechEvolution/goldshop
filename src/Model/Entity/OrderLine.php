<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderLine Entity
 *
 * @property string $id
 * @property string $order_id
 * @property string $product_id
 * @property int $seq
 * @property float $netamt
 * @property float $vatamt
 * @property float $totalamt
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property int $qty
 * @property string $image_id
 * @property string $bpartner_id
 * @property \Cake\I18n\FrozenDate $orderdate
 * @property float $order_price
 * @property string $order_status
 * @property string $order_history
 * @property string $order_ispaid
 * @property \Cake\I18n\FrozenTime $order_paiddate
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\Bpartner $bpartner
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class OrderLine extends Entity
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
        'order_id' => true,
        'product_id' => true,
        'seq' => true,
        'netamt' => true,
        'vatamt' => true,
        'totalamt' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'qty' => true,
        'image_id' => true,
        'bpartner_id' => true,
        'orderdate' => true,
        'order_price' => true,
        'order_status' => true,
        'order_history' => true,
        'order_ispaid' => true,
        'order_paiddate' => true,
        'order' => true,
        'product' => true,
        'image' => true,
        'bpartner' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
