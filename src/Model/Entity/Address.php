<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property string $id
 * @property string $address_line
 * @property string $houseno
 * @property string $villageno
 * @property string $villagename
 * @property string $subdistrict
 * @property string $district
 * @property string $postalcode
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\Bpartner[] $bpartners
 * @property \App\Model\Entity\Branch[] $branches
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class Address extends Entity
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
        'address_line' => true,
        'houseno' => true,
        'villageno' => true,
        'villagename' => true,
        'subdistrict' => true,
        'district' => true,
        'postalcode' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'province' => true,
        'bpartners' => true,
        'branches' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
