<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StorageBinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StorageBinsTable Test Case
 */
class StorageBinsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StorageBinsTable
     */
    public $StorageBins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.storage_bins',
        'app.warehouses',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.product_categories',
        'app.product_sub_categories',
        'app.invoice_lines',
        'app.order_lines',
        'app.wh_products',
        'app.serial_numbers',
        'app.users',
        'app.roles',
        'app.branches',
        'app.addresses',
        'app.provinces',
        'app.bpartners',
        'app.invoices',
        'app.orders',
        'app.payments',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.sequent_numbers',
        'app.system_usages',
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
        $config = TableRegistry::exists('StorageBins') ? [] : ['className' => StorageBinsTable::class];
        $this->StorageBins = TableRegistry::get('StorageBins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StorageBins);

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
