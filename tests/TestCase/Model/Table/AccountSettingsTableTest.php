<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountSettingsTable Test Case
 */
class AccountSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountSettingsTable
     */
    public $AccountSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.account_settings',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.product_categories',
        'app.designs',
        'app.user_created',
        'app.roles',
        'app.role_accesses',
        'app.actions',
        'app.controllers',
        'app.users',
        'app.branches',
        'app.addresses',
        'app.provinces',
        'app.bpartners',
        'app.invoices',
        'app.orders',
        'app.order_lines',
        'app.payment_lines',
        'app.payments',
        'app.user_modified',
        'app.system_usages',
        'app.seller',
        'app.income_types',
        'app.pawns',
        'app.warehouses',
        'app.invoice_lines',
        'app.glitems',
        'app.invoice_exchange',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.pawn_lines',
        'app.saving_accounts',
        'app.goods_transactions',
        'app.goods_lines',
        'app.to_warehouse',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights',
        'app.branchs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AccountSettings') ? [] : ['className' => AccountSettingsTable::class];
        $this->AccountSettings = TableRegistry::get('AccountSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccountSettings);

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
