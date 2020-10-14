<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WhProduct Entity
 *
 * @property string $id
 * @property string $product_id
 * @property int $balance_amt
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $description
 * @property string $storage_bin_id
 * @property string $warehouse_id
 * @property int $inorderqty
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\StorageBin $storage_bin
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\SerialNumber[] $serial_numbers
 */
class WhProduct extends Entity
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
        'balance_amt' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'description' => true,
        'storage_bin_id' => true,
        'warehouse_id' => true,
        'inorderqty' => true,
        'product' => true,
        'storage_bin' => true,
        'warehouse' => true,
        'serial_numbers' => true
    ];
}
