<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StorageBin Entity
 *
 * @property string $id
 * @property string $name
 * @property string $isdefault
 * @property string $warehouse_id
 * @property int $seq
 * @property string $description
 * @property string $isactive
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 *
 * @property \App\Model\Entity\Warehouse $warehouse
 */
class StorageBin extends Entity
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
        'isdefault' => true,
        'warehouse_id' => true,
        'seq' => true,
        'description' => true,
        'isactive' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'warehouse' => true
    ];
}
