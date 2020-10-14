<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesignsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesignsTable Test Case
 */
class DesignsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DesignsTable
     */
    public $Designs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.designs',
        'app.product_categories',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.product_sub_categories',
        'app.sizes',
        'app.user_created',
        'app.roles',
        'app.role_accesses',
        'app.actions',
        'app.controllers',
        'app.users',
        'app.branches',
        'app.addresses',
        'app.bpartners',
        'app.invoices',
        'app.orders',
        'app.order_lines',
        'app.user_modified',
        'app.system_usages',
        'app.payment_lines',
        'app.payments',
        'app.warehouses',
        'app.invoice_lines',
        'app.glitems',
        'app.invoice_exchange',
        'app.saving_transactions',
        'app.saving_accounts',
        'app.seller',
        'app.pawns',
        'app.pawn_lines',
        'app.pawn_transactions',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.payment_method_lines',
        'app.income_types',
        'app.goods_transactions',
        'app.goods_lines',
        'app.to_warehouse',
        'app.from_warehouse',
        'app.sequent_numbers',
        'app.weights',
        'app.sd_weights',
        'app.cost_lines',
        'app.costs',
        'app.gold_price_lines',
        'app.gold_prices',
        'app.master_prices',
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
        $config = TableRegistry::exists('Designs') ? [] : ['className' => DesignsTable::class];
        $this->Designs = TableRegistry::get('Designs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Designs);

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
