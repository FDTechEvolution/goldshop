<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GoldPricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GoldPricesTable Test Case
 */
class GoldPricesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GoldPricesTable
     */
    public $GoldPrices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gold_prices',
        'app.branches',
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
        'app.system_usages',
        'app.user_modified',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights',
        'app.sd_weights',
        'app.cost_lines',
        'app.costs',
        'app.gold_price_lines',
        'app.goods_lines',
        'app.goods_transactions',
        'app.to_warehouse',
        'app.invoice_lines',
        'app.invoices',
        'app.bpartners',
        'app.addresses',
        'app.order_lines',
        'app.orders',
        'app.payment_lines',
        'app.payments',
        'app.warehouses',
        'app.pawns',
        'app.pawn_lines',
        'app.pawn_transactions',
        'app.seller',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.payment_method_lines',
        'app.income_types',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.glitems',
        'app.invoice_exchange',
        'app.from_warehouse',
        'app.branchs',
        'app.sequent_numbers',
        'app.master_prices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GoldPrices') ? [] : ['className' => GoldPricesTable::class];
        $this->GoldPrices = TableRegistry::get('GoldPrices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GoldPrices);

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
