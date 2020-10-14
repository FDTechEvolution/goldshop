<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\TransactionsComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\TransactionsComponent Test Case
 */
class TransactionsComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\TransactionsComponent
     */
    public $Transactions;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Transactions = new TransactionsComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transactions);

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
