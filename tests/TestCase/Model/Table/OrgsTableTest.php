<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrgsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrgsTable Test Case
 */
class OrgsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrgsTable
     */
    public $Orgs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.branchs',
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
        $config = TableRegistry::exists('Orgs') ? [] : ['className' => OrgsTable::class];
        $this->Orgs = TableRegistry::get('Orgs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Orgs);

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
