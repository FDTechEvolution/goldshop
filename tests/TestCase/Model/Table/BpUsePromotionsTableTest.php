<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BpUsePromotionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BpUsePromotionsTable Test Case
 */
class BpUsePromotionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BpUsePromotionsTable
     */
    public $BpUsePromotions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bp_use_promotions',
        'app.bpartners',
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
        'app.user_modified',
        'app.system_usages',
        'app.goods_transactions',
        'app.goods_lines',
        'app.to_warehouse',
        'app.invoice_lines',
        'app.invoices',
        'app.orders',
        'app.order_lines',
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
        'app.sequent_numbers',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights',
        'app.sd_weights',
        'app.cost_lines',
        'app.costs',
        'app.gold_price_lines',
        'app.gold_prices',
        'app.branchs',
        'app.promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BpUsePromotions') ? [] : ['className' => BpUsePromotionsTable::class];
        $this->BpUsePromotions = TableRegistry::get('BpUsePromotions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BpUsePromotions);

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
