<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\JsonDataComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\JsonDataComponent Test Case
 */
class JsonDataComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\JsonDataComponent
     */
    public $JsonData;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->JsonData = new JsonDataComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JsonData);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
