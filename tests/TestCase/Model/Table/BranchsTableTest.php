<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchsTable Test Case
 */
class BranchsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchsTable
     */
    public $Branchs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.branchs',
        'app.orgs',
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.product_images',
        'app.products',
        'app.wh_products',
        'app.warehouses',
        'app.branches',
        'app.serial_numbers',
        'app.bpartners',
        'app.invoices',
        'app.orders',
        'app.users',
        'app.roles',
        'app.system_usages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Branchs') ? [] : ['className' => BranchsTable::class];
        $this->Branchs = TableRegistry::get('Branchs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Branchs);

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
