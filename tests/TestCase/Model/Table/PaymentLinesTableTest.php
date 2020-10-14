<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentLinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentLinesTable Test Case
 */
class PaymentLinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentLinesTable
     */
    public $PaymentLines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.payment_lines',
        'app.payments',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.product_categories',
        'app.orgs',
        'app.bpartners',
        'app.branches',
        'app.addresses',
        'app.user_created',
        'app.roles',
        'app.role_accesses',
        'app.actions',
        'app.controllers',
        'app.users',
        'app.system_usages',
        'app.user_modified',
        'app.goods_transactions',
        'app.goods_lines',
        'app.orders',
        'app.invoices',
        'app.invoice_lines',
        'app.warehouses',
        'app.pawns',
        'app.pawn_lines',
        'app.pawn_transactions',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.glitems',
        'app.invoice_exchange',
        'app.saving_transactions',
        'app.saving_accounts',
        'app.seller',
        'app.order_lines',
        'app.to_warehouse',
        'app.from_warehouse',
        'app.sequent_numbers',
        'app.branchs',
        'app.designs',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights',
        'app.sd_weights',
        'app.cost_lines',
        'app.costs',
        'app.gold_price_lines',
        'app.gold_prices',
        'app.master_prices',
        'app.bank_account_transactions',
        'app.payment_method_lines',
        'app.income_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PaymentLines') ? [] : ['className' => PaymentLinesTable::class];
        $this->PaymentLines = TableRegistry::get('PaymentLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PaymentLines);

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
