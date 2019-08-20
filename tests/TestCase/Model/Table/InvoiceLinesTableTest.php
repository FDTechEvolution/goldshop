<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoiceLinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoiceLinesTable Test Case
 */
class InvoiceLinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoiceLinesTable
     */
    public $InvoiceLines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.invoice_lines',
        'app.invoices',
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
        'app.user_modified',
        'app.system_usages',
        'app.goods_transactions',
        'app.goods_lines',
        'app.to_warehouse',
        'app.storage_bins',
        'app.warehouses',
        'app.wh_products',
        'app.serial_numbers',
        'app.orders',
        'app.order_lines',
        'app.payment_lines',
        'app.payments',
        'app.income_types',
        'app.seller',
        'app.pawns',
        'app.pawn_lines',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights',
        'app.branchs',
        'app.invoice_exchange'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InvoiceLines') ? [] : ['className' => InvoiceLinesTable::class];
        $this->InvoiceLines = TableRegistry::get('InvoiceLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvoiceLines);

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
