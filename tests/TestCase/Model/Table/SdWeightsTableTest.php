<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdWeightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdWeightsTable Test Case
 */
class SdWeightsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdWeightsTable
     */
    public $SdWeights;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_weights',
        'app.cost_lines',
        'app.costs',
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
        'app.goods_lines',
        'app.goods_transactions',
        'app.to_warehouse',
        'app.invoice_lines',
        'app.invoices',
        'app.bpartners',
        'app.addresses',
        'app.provinces',
        'app.orders',
        'app.order_lines',
        'app.payment_lines',
        'app.payments',
        'app.seller',
        'app.income_types',
        'app.pawns',
        'app.warehouses',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.pawn_lines',
        'app.saving_accounts',
        'app.glitems',
        'app.invoice_exchange',
        'app.from_warehouse',
        'app.saving_transactions',
        'app.branchs',
        'app.sequent_numbers',
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
        $config = TableRegistry::exists('SdWeights') ? [] : ['className' => SdWeightsTable::class];
        $this->SdWeights = TableRegistry::get('SdWeights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdWeights);

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
}
