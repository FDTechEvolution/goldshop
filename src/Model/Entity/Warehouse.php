<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Warehouse Entity
 *
 * @property string $id
 * @property string $name
 * @property string $org_id
 * @property string $branch_id
 * @property string $isactive
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $ismain
 * @property string $issales
 * @property string $ispurchase
 * @property string $ispawn
 * @property string $islock
 * @property string $type
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\InvoiceLine[] $invoice_lines
 * @property \App\Model\Entity\Pawn[] $pawns
 * @property \App\Model\Entity\StorageBin[] $storage_bins
 * @property \App\Model\Entity\WhProduct[] $wh_products
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class Warehouse extends Entity
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
        'org_id' => true,
        'branch_id' => true,
        'isactive' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'ismain' => true,
        'issales' => true,
        'ispurchase' => true,
        'ispawn' => true,
        'islock' => true,
        'type' => true,
        'org' => true,
        'branch' => true,
        'invoice_lines' => true,
        'pawns' => true,
        'storage_bins' => true,
        'wh_products' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
