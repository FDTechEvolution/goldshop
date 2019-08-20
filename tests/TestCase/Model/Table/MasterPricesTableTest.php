<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MasterPricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MasterPricesTable Test Case
 */
class MasterPricesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MasterPricesTable
     */
    public $MasterPrices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.master_prices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MasterPrices') ? [] : ['className' => MasterPricesTable::class];
        $this->MasterPrices = TableRegistry::get('MasterPrices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MasterPrices);

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
