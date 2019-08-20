<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankAccountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankAccountsTable Test Case
 */
class BankAccountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BankAccountsTable
     */
    public $BankAccounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.orgs',
        'app.bpartners',
        'app.branches',
        'app.addresses',
        'app.provinces',
        'app.invoices',
        'app.orders',
        'app.invoice_lines',
        'app.products',
        'app.product_categories',
        'app.product_sub_categories',
        'app.order_lines',
        'app.product_images',
        'app.wh_products',
        'app.storage_bins',
        'app.warehouses',
        'app.user_created',
        'app.roles',
        'app.users',
        'app.system_usages',
        'app.user_modified',
        'app.serial_numbers',
        'app.payment_lines',
        'app.seller',
        'app.payments',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.branchs',
        'app.pawns',
        'app.pawn_lines'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BankAccounts') ? [] : ['className' => BankAccountsTable::class];
        $this->BankAccounts = TableRegistry::get('BankAccounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankAccounts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
