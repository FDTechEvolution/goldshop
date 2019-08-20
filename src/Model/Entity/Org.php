<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Org Entity
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $taxid
 * @property string $isactive
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $description
 *
 * @property \App\Model\Entity\BankAccount[] $bank_accounts
 * @property \App\Model\Entity\Bpartner[] $bpartners
 * @property \App\Model\Entity\Branch[] $branchs
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Warehouse[] $warehouses
 */
class Org extends Entity
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
        'taxid' => true,
        'isactive' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'description' => true,
        'bank_accounts' => true,
        'bpartners' => true,
        'branchs' => true,
        'images' => true,
        'invoices' => true,
        'products' => true,
        'users' => true,
        'warehouses' => true
    ];
}
