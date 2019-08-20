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
