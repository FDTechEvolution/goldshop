<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Branch Entity
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $isheadquarters
 * @property string $org_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $address_id
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\BankAccount[] $bank_accounts
 * @property \App\Model\Entity\Bpartner[] $bpartners
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\SavingAccount[] $saving_accounts
 * @property \App\Model\Entity\SavingTransaction[] $saving_transactions
 * @property \App\Model\Entity\SequentNumber[] $sequent_numbers
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Warehouse[] $warehouses
 */
class Branch extends Entity
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
        'isheadquarters' => true,
        'org_id' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'address_id' => true,
        'org' => true,
        'address' => true,
        'bank_accounts' => true,
        'bpartners' => true,
        'invoices' => true,
        'orders' => true,
        'payments' => true,
        'saving_accounts' => true,
        'saving_transactions' => true,
        'sequent_numbers' => true,
        'users' => true,
        'warehouses' => true
    ];
}
