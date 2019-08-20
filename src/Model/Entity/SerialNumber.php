<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SerialNumber Entity
 *
 * @property string $id
 * @property string $wh_product_id
 * @property string $code
 * @property string $isprinted
 * @property \Cake\I18n\FrozenTime $printeddate
 * @property string $issales
 * @property string $isactive
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $description
 *
 * @property \App\Model\Entity\WhProduct $wh_product
 */
class SerialNumber extends Entity
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
        'wh_product_id' => true,
        'code' => true,
        'isprinted' => true,
        'printeddate' => true,
        'issales' => true,
        'isactive' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'description' => true,
        'wh_product' => true
    ];
}
