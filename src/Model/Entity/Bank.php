<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bank Entity
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $image_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $iscash
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BankAccount[] $bank_accounts
 */
class Bank extends Entity
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
        'image_id' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'iscash' => true,
        'image' => true,
        'user' => true,
        'bank_accounts' => true
    ];
}
