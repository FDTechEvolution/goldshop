<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentLinesFixture
 *
 */
class PaymentLinesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'seq' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'payment_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'invoice_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'income_type_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'order_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'pawn_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'saving_account_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'product_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'createdby' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modifiedby' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'amount' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'qty' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => ''],
        'totalamount' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        'isexchange' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => 'N', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'isdispose' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => 'N', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'isoverprice' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => 'N', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'exchangamt' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => '0.00', 'comment' => ''],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'acbc56e1-ab28-48c7-b6b0-9789b9ce9948',
            'seq' => 1,
            'payment_id' => '512bbcc6-f8a7-4c74-ac79-14f2a8f6f634',
            'invoice_id' => 'b38382a7-fa29-4dad-8600-83be4537465b',
            'income_type_id' => '1943628d-15c0-4557-8752-83f7c24f960d',
            'order_id' => 'f99fb178-c768-4e56-9e3a-35f440fa301c',
            'pawn_id' => '487fde8b-98ac-4163-af04-fdafefdbd23b',
            'saving_account_id' => '720d526c-d417-467b-8732-50d9c0caf753',
            'product_id' => 'ceea2a8e-cd0f-414c-94e1-be1427db9a3a',
            'description' => 'Lorem ipsum dolor sit amet',
            'created' => '2020-08-19 12:02:57',
            'createdby' => '5de5ad9a-8083-4151-96d0-f516bf8ce178',
            'modified' => '2020-08-19 12:02:57',
            'modifiedby' => 'a77df196-faa8-4af5-91e9-d90ee6510d8c',
            'amount' => 1.5,
            'qty' => 1.5,
            'totalamount' => 1.5,
            'isexchange' => 'Lorem ipsum dolor sit amet',
            'isdispose' => 'Lorem ipsum dolor sit amet',
            'isoverprice' => 'Lorem ipsum dolor sit amet',
            'exchangamt' => 1.5
        ],
    ];
}
