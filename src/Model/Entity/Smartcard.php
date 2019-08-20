<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Smartcard Entity
 *
 * @property string $id
 * @property string $ip
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $gender
 * @property string $cardno
 * @property string $full_address
 * @property \Cake\I18n\FrozenTime $created
 * @property string $description
 * @property string $houseno
 * @property string $moo
 * @property string $sub_district
 * @property string $district
 * @property string $province
 * @property string $birthday
 * @property string $address_line
 */
class Smartcard extends Entity
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
        'ip' => true,
        'title' => true,
        'firstname' => true,
        'lastname' => true,
        'gender' => true,
        'cardno' => true,
        'full_address' => true,
        'created' => true,
        'description' => true,
        'houseno' => true,
        'moo' => true,
        'sub_district' => true,
        'district' => true,
        'province' => true,
        'birthday' => true,
        'address_line' => true
    ];
}
