<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BankAccountsFixture
 *
 */
class BankAccountsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'total_balance' => ['type' => 'decimal', 'length' => 16, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'account_name' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bank_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'account_type' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'accountno' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'bank_office' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'org_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'branch_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'createdby' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modifiedby' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'type' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => 'BACC', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
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
            'id' => '16dd2e41-5c15-4591-84b0-099e6192e57e',
            'total_balance' => 1.5,
            'account_name' => 'Lorem ipsum dolor sit amet',
            'bank_id' => 'faeb9bf6-bcf4-4ab8-83ff-c69b4bf4bb56',
            'account_type' => 'Lorem ipsum dolor sit amet',
            'accountno' => 'Lorem ip',
            'bank_office' => 'Lorem ipsum dolor sit amet',
            'org_id' => 'f85c0c27-f6f7-4284-a5a3-f21022b4475c',
            'branch_id' => '081947f7-d051-4643-bfbe-4dd75e4f5f0c',
            'description' => 'Lorem ipsum dolor sit amet',
            'created' => '2020-02-18 11:15:14',
            'createdby' => '0b83165e-5245-4ea3-b586-0ddcc0436cb9',
            'modified' => '2020-02-18 11:15:14',
            'modifiedby' => 'e67607fd-58de-485e-8d1e-325aa755d017',
            'type' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
