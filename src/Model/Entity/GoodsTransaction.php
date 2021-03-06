<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoodsTransaction Entity
 *
 * @property string $id
 * @property string $docno
 * @property \Cake\I18n\FrozenDate $docdate
 * @property string $type
 * @property string $description
 * @property string $status
 * @property string $branch_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $from_warehouse
 * @property string $to_warehouse
 * @property string $seller
 * @property string $isdispose
 * @property string $bpartner_id
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Bpartner $bpartner
 * @property \App\Model\Entity\GoodsLine[] $goods_lines
 */
class GoodsTransaction extends Entity
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
        'docno' => true,
        'docdate' => true,
        'type' => true,
        'description' => true,
        'status' => true,
        'branch_id' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'from_warehouse' => true,
        'to_warehouse' => true,
        'seller' => true,
        'isdispose' => true,
        'bpartner_id' => true,
        'branch' => true,
        'bpartner' => true,
        'goods_lines' => true
    ];
}
