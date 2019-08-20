<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmartcardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmartcardsTable Test Case
 */
class SmartcardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SmartcardsTable
     */
    public $Smartcards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.smartcards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Smartcards') ? [] : ['className' => SmartcardsTable::class];
        $this->Smartcards = TableRegistry::get('Smartcards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Smartcards);

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
