<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SequentNumber Entity
 *
 * @property string $id
 * @property string $doccode
 * @property string $prefix
 * @property string $suffix
 * @property int $start_no
 * @property int $current_no
 * @property int $running_length
 * @property string $current_sequent
 * @property string $description
 * @property string $org_id
 * @property string $branch_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $isactive
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class SequentNumber extends Entity
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
        'doccode' => true,
        'prefix' => true,
        'suffix' => true,
        'start_no' => true,
        'current_no' => true,
        'running_length' => true,
        'current_sequent' => true,
        'description' => true,
        'org_id' => true,
        'branch_id' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'isactive' => true,
        'org' => true,
        'branch' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
