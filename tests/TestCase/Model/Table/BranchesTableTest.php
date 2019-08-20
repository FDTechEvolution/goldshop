<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchesTable Test Case
 */
class BranchesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchesTable
     */
    public $Branches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.branches',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.product_categories',
        'app.designs',
        'app.product_sub_categories',
        'app.sizes',
        'app.weights',
        'app.goods_lines',
        'app.goods_transactions',
        'app.user_created',
        'app.roles',
        'app.role_accesses',
        'app.actions',
        'app.controllers',
        'app.users',
        'app.system_usages',
        'app.user_modified',
        'app.to_warehouse',
        'app.invoice_lines',
        'app.invoices',
        'app.bpartners',
        'app.addresses',
        'app.provinces',
        'app.orders',
        'app.payment_lines',
        'app.payments',
        'app.income_types',
        'app.seller',
        'app.warehouses',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.order_lines',
        'app.pawn_lines',
        'app.pawns',
        'app.saving_transactions',
        'app.branchs',
        'app.saving_accounts',
        'app.sequent_numbers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Branches') ? [] : ['className' => BranchesTable::class];
        $this->Branches = TableRegistry::get('Branches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Branches);

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
