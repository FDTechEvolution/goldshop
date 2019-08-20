<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cost Entity
 *
 * @property string $id
 * @property string $org_id
 * @property string $branch_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $description
 * @property \Cake\I18n\FrozenDate $startdate
 * @property \Cake\I18n\FrozenDate $enddate
 * @property string $type
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\CostLine[] $cost_lines
 */
class Cost extends Entity
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
        'org_id' => true,
        'branch_id' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'description' => true,
        'startdate' => true,
        'enddate' => true,
        'type' => true,
        'branch' => true,
        'cost_lines' => true
    ];
}
