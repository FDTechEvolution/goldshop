<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WarehousesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WarehousesTable Test Case
 */
class WarehousesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WarehousesTable
     */
    public $Warehouses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.warehouses',
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
        'app.pawn_lines',
        'app.saving_accounts',
        'app.invoice_lines',
        'app.glitems',
        'app.invoice_exchange',
        'app.goods_transactions',
        'app.goods_lines',
        'app.to_warehouse',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights',
        'app.sd_weights',
        'app.cost_lines',
        'app.costs',
        'app.gold_price_lines',
        'app.gold_prices',
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
        $config = TableRegistry::exists('Warehouses') ? [] : ['className' => WarehousesTable::class];
        $this->Warehouses = TableRegistry::get('Warehouses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Warehouses);

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
