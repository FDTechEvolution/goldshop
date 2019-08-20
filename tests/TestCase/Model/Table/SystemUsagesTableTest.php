<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SystemUsagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SystemUsagesTable Test Case
 */
class SystemUsagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SystemUsagesTable
     */
    public $SystemUsages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.system_usages',
        'app.users',
        'app.roles',
        'app.role_accesses',
        'app.actions',
        'app.controllers',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.product_categories',
        'app.designs',
        'app.user_created',
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
        'app.income_types',
        'app.seller',
        'app.invoice_lines',
        'app.warehouses',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.invoice_exchange',
        'app.goods_transactions',
        'app.goods_lines',
        'app.to_warehouse',
        'app.pawns',
        'app.pawn_lines',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.product_sub_categories',
        'app.sizes',
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
        $config = TableRegistry::exists('SystemUsages') ? [] : ['className' => SystemUsagesTable::class];
        $this->SystemUsages = TableRegistry::get('SystemUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SystemUsages);

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
