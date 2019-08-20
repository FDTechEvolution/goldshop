<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PaymentLine Entity
 *
 * @property string $id
 * @property int $seq
 * @property string $payment_id
 * @property string $invoice_id
 * @property string $income_type_id
 * @property string $order_id
 * @property string $pawn_id
 * @property string $saving_account_id
 * @property string $product_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property float $amount
 * @property float $qty
 * @property float $totalamount
 * @property string $isexchange
 * @property string $isdispose
 * @property string $isoverprice
 *
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\IncomeType $income_type
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Pawn $pawn
 * @property \App\Model\Entity\SavingAccount $saving_account
 * @property \App\Model\Entity\Product $product
 */
class PaymentLine extends Entity
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
        'seq' => true,
        'payment_id' => true,
        'invoice_id' => true,
        'income_type_id' => true,
        'order_id' => true,
        'pawn_id' => true,
        'saving_account_id' => true,
        'product_id' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'amount' => true,
        'qty' => true,
        'totalamount' => true,
        'isexchange' => true,
        'isdispose' => true,
        'isoverprice' => true,
        'payment' => true,
        'invoice' => true,
        'income_type' => true,
        'order' => true,
        'pawn' => true,
        'saving_account' => true,
        'product' => true
    ];
}
