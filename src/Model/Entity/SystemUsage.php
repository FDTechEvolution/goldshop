<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SystemUsage Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string $ipaddress
 * @property string $isactive
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $description
 *
 * @property \App\Model\Entity\User $user
 */
class SystemUsage extends Entity
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
        'user_id' => true,
        'ipaddress' => true,
        'isactive' => true,
        'created' => true,
        'modified' => true,
        'description' => true,
        'user' => true
    ];
}
