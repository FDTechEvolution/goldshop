<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property string $id
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $mobileno
 * @property string $cardno
 * @property string $email
 * @property \Cake\I18n\FrozenDate $birthday
 * @property \Cake\I18n\FrozenDate $startdate
 * @property string $password
 * @property string $username
 * @property string $isactive
 * @property string $role_id
 * @property string $position
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $description
 * @property string $org_id
 * @property string $branch_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\SystemUsage[] $system_usages
 */
class User extends Entity
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
        'title' => true,
        'firstname' => true,
        'lastname' => true,
        'mobileno' => true,
        'cardno' => true,
        'email' => true,
        'birthday' => true,
        'startdate' => true,
        'password' => true,
        'username' => true,
        'isactive' => true,
        'role_id' => true,
        'position' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'description' => true,
        'org_id' => true,
        'branch_id' => true,
        'role' => true,
        'system_usages' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
     protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
