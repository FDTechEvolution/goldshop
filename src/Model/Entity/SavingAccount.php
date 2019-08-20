<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SavingAccount Entity
 *
 * @property string $id
 * @property string $bpartner_id
 * @property \Cake\I18n\FrozenDate $registerdate
 * @property string $org_id
 * @property string $branch_id
 * @property string $description
 * @property float $balanceamt
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 *
 * @property \App\Model\Entity\Bpartner $bpartner
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\PaymentLine[] $payment_lines
 */
class SavingAccount extends Entity
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
        'bpartner_id' => true,
        'registerdate' => true,
        'org_id' => true,
        'branch_id' => true,
        'description' => true,
        'balanceamt' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'bpartner' => true,
        'org' => true,
        'branch' => true,
        'payment_lines' => true
    ];
}
