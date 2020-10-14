<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CheckStockComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CheckStockComponent Test Case
 */
class CheckStockComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\CheckStockComponent
     */
    public $CheckStock;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->CheckStock = new CheckStockComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CheckStock);

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
