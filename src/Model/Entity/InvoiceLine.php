<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceLine Entity
 *
 * @property string $id
 * @property string $invoice_id
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
 * @property float $price
 * @property string $warehouse_id
 * @property string $invoice_exchange
 * @property string $glitem_id
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 * @property \App\Model\Entity\Invoice $InvoiceExchange
 */
class InvoiceLine extends Entity
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
        'invoice_id' => true,
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
        'price' => true,
        'warehouse_id' => true,
        'invoice_exchange' => true,
        'glitem_id' => true,
        'invoice' => true,
        'product' => true,
        'warehouse' => true,
        'UserCreated' => true,
        'UserModified' => true,
        'InvoiceExchange' => true
    ];
}
