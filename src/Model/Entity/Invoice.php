<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property string $id
 * @property string $org_id
 * @property string $branch_id
 * @property string $isactive
 * @property \Cake\I18n\FrozenDate $docdate
 * @property \Cake\I18n\FrozenDate $duedate
 * @property string $docno
 * @property string $docstatus
 * @property string $bpartner_id
 * @property float $netamt
 * @property float $vatamt
 * @property float $totalamt
 * @property float $totalpaid
 * @property string $ispaid
 * @property string $issale
 * @property string $order_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modifiedby
 * @property string $paymentmethod
 * @property string $seller
 * @property string $isexchange
 * @property float $discount
 * @property float $usesavingamt
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Bpartner $bpartner
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\InvoiceLine[] $invoice_lines
 * @property \App\Model\Entity\PaymentLine[] $payment_lines
 * @property \App\Model\Entity\User $Seller
 * @property \App\Model\Entity\User $UserCreated
 * @property \App\Model\Entity\User $UserModified
 */
class Invoice extends Entity
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
        'isactive' => true,
        'docdate' => true,
        'duedate' => true,
        'docno' => true,
        'docstatus' => true,
        'bpartner_id' => true,
        'netamt' => true,
        'vatamt' => true,
        'totalamt' => true,
        'totalpaid' => true,
        'ispaid' => true,
        'issale' => true,
        'order_id' => true,
        'created' => true,
        'createdby' => true,
        'modified' => true,
        'modifiedby' => true,
        'paymentmethod' => true,
        'seller' => true,
        'isexchange' => true,
        'discount' => true,
        'usesavingamt' => true,
        'org' => true,
        'branch' => true,
        'bpartner' => true,
        'order' => true,
        'invoice_lines' => true,
        'payment_lines' => true,
        'Seller' => true,
        'UserCreated' => true,
        'UserModified' => true
    ];
}
