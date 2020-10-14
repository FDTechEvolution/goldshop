<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PawnTransaction Entity
 *
 * @property string $id
 * @property string $pawn_id
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property string $type
 * @property string $description
 * @property float $amount
 * @property string $seller
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property float $rate
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property float $interestamt
 * @property string $payment_id
 * @property float $discount
 *
 * @property \App\Model\Entity\Pawn $pawn
 * @property \App\Model\Entity\Payment $payment
 */
class PawnTransaction extends Entity
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
        'pawn_id' => true,
        'transaction_date' => true,
        'type' => true,
        'description' => true,
        'amount' => true,
        'seller' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'rate' => true,
        'start_date' => true,
        'end_date' => true,
        'interestamt' => true,
        'payment_id' => true,
        'discount' => true,
        'pawn' => true,
        'payment' => true
    ];
}
