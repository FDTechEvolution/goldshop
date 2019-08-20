<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SequentNumbersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SequentNumbersTable Test Case
 */
class SequentNumbersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SequentNumbersTable
     */
    public $SequentNumbers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sequent_numbers',
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
        'app.warehouses',
        'app.branches',
        'app.addresses',
        'app.provinces',
        'app.bpartners',
        'app.invoices',
        'app.orders',
        'app.payments',
        'app.saving_accounts',
        'app.saving_transactions',
        'app.users',
        'app.roles',
        'app.system_usages',
        'app.storage_bins',
        'app.user_created',
        'app.user_modified',
        'app.serial_numbers',
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
        $config = TableRegistry::exists('SequentNumbers') ? [] : ['className' => SequentNumbersTable::class];
        $this->SequentNumbers = TableRegistry::get('SequentNumbers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SequentNumbers);

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
