<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SizesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SizesTable Test Case
 */
class SizesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SizesTable
     */
    public $Sizes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sizes',
        'app.product_categories',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.product_sub_categories',
        'app.invoice_lines',
        'app.invoices',
        'app.branches',
        'app.addresses',
        'app.provinces',
        'app.bpartners',
        'app.orders',
        'app.payments',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.user_created',
        'app.roles',
        'app.users',
        'app.system_usages',
        'app.user_modified',
        'app.warehouses',
        'app.storage_bins',
        'app.wh_products',
        'app.serial_numbers',
        'app.payment_lines',
        'app.seller',
        'app.order_lines',
        'app.pawns',
        'app.pawn_lines',
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
        $config = TableRegistry::exists('Sizes') ? [] : ['className' => SizesTable::class];
        $this->Sizes = TableRegistry::get('Sizes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sizes);

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
