<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bpartner Entity
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $iscustomer
 * @property string $isactive
 * @property string $taxid
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $religion
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $midified
 * @property string $modifiedby
 * @property string $description
 * @property string $org_id
 * @property string $branch_id
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $address_id
 * @property string $iscompany
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\OrderLine[] $order_lines
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Pawn[] $pawns
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\SavingAccount[] $saving_accounts
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class Bpartner extends Entity
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
        'code' => true,
        'name' => true,
        'title' => true,
        'firstname' => true,
        'lastname' => true,
        'iscustomer' => true,
        'isactive' => true,
        'taxid' => true,
        'birthday' => true,
        'religion' => true,
        'created' => true,
        'createdby' => true,
        'midified' => true,
        'modifiedby' => true,
        'description' => true,
        'org_id' => true,
        'branch_id' => true,
        'phone' => true,
        'mobile' => true,
        'email' => true,
        'address_id' => true,
        'iscompany' => true,
        'org' => true,
        'branch' => true,
        'address' => true,
        'invoices' => true,
        'order_lines' => true,
        'orders' => true,
        'pawns' => true,
        'payments' => true,
        'saving_accounts' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
