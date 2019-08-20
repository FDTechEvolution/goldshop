<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Glitem Entity
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\InvoiceLine[] $invoice_lines
 */
class Glitem extends Entity
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
        'code' => true,
        'created' => true,
        'modified' => true,
        'invoice_lines' => true
    ];
}
