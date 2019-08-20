<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomeTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomeTypesTable Test Case
 */
class IncomeTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IncomeTypesTable
     */
    public $IncomeTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.income_types',
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
        'app.provinces',
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
        'app.seller',
        'app.warehouses',
        'app.pawns',
        'app.pawn_lines',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.glitems',
        'app.invoice_exchange',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.branchs',
        'app.designs',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IncomeTypes') ? [] : ['className' => IncomeTypesTable::class];
        $this->IncomeTypes = TableRegistry::get('IncomeTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncomeTypes);

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
