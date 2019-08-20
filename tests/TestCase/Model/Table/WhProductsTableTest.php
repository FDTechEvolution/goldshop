<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WhProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WhProductsTable Test Case
 */
class WhProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WhProductsTable
     */
    public $WhProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wh_products',
        'app.products',
        'app.product_categories',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.users',
        'app.roles',
        'app.branches',
        'app.addresses',
        'app.provinces',
        'app.bpartners',
        'app.invoices',
        'app.orders',
        'app.payments',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.user_created',
        'app.system_usages',
        'app.user_modified',
        'app.warehouses',
        'app.storage_bins',
        'app.branchs',
        'app.product_sub_categories',
        'app.invoice_lines',
        'app.order_lines',
        'app.serial_numbers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WhProducts') ? [] : ['className' => WhProductsTable::class];
        $this->WhProducts = TableRegistry::get('WhProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WhProducts);

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
