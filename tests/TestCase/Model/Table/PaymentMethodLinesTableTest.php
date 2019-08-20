<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentMethodLinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentMethodLinesTable Test Case
 */
class PaymentMethodLinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentMethodLinesTable
     */
    public $PaymentMethodLines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.payment_method_lines',
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
        'app.to_warehouse',
        'app.invoice_lines',
        'app.invoices',
        'app.orders',
        'app.order_lines',
        'app.payment_lines',
        'app.income_types',
        'app.pawns',
        'app.warehouses',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.pawn_lines',
        'app.pawn_transactions',
        'app.seller',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.glitems',
        'app.invoice_exchange',
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
        'app.gold_prices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PaymentMethodLines') ? [] : ['className' => PaymentMethodLinesTable::class];
        $this->PaymentMethodLines = TableRegistry::get('PaymentMethodLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PaymentMethodLines);

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
