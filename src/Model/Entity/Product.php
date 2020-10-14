<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $unittype
 * @property float $cost
 * @property string $cost2
 * @property float $actual_price
 * @property string $description
 * @property string $isactive
 * @property string $product_category_id
 * @property string $product_sub_category_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $midified
 * @property string $modifiedby
 * @property string $org_id
 * @property string $size_id
 * @property string $weight_id
 * @property string $design_id
 * @property float $percent
 * @property string $image_id
 * @property float $manual_weight
 * @property string $isprinted
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\ProductSubCategory $product_sub_category
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Size $size
 * @property \App\Model\Entity\Weight $weight
 * @property \App\Model\Entity\Design $design
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\GoodsLine[] $goods_lines
 * @property \App\Model\Entity\InvoiceLine[] $invoice_lines
 * @property \App\Model\Entity\OrderLine[] $order_lines
 * @property \App\Model\Entity\PawnLine[] $pawn_lines
 * @property \App\Model\Entity\PaymentLine[] $payment_lines
 * @property \App\Model\Entity\ProductImage[] $product_images
 * @property \App\Model\Entity\WhProduct[] $wh_products
 */
class Product extends Entity
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
        'code' => true,
        'unittype' => true,
        'cost' => true,
        'cost2' => true,
        'actual_price' => true,
        'description' => true,
        'isactive' => true,
        'product_category_id' => true,
        'product_sub_category_id' => true,
        'created' => true,
        'createdby' => true,
        'midified' => true,
        'modifiedby' => true,
        'org_id' => true,
        'size_id' => true,
        'weight_id' => true,
        'design_id' => true,
        'percent' => true,
        'image_id' => true,
        'manual_weight' => true,
        'isprinted' => true,
        'product_category' => true,
        'product_sub_category' => true,
        'org' => true,
        'size' => true,
        'weight' => true,
        'design' => true,
        'image' => true,
        'goods_lines' => true,
        'invoice_lines' => true,
        'order_lines' => true,
        'pawn_lines' => true,
        'payment_lines' => true,
        'product_images' => true,
        'wh_products' => true
    ];
}
