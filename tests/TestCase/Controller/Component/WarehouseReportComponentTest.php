<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\WarehouseReportComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\WarehouseReportComponent Test Case
 */
class WarehouseReportComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\WarehouseReportComponent
     */
    public $WarehouseReport;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->WarehouseReport = new WarehouseReportComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WarehouseReport);

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
