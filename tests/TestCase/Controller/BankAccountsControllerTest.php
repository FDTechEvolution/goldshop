<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BankAccountsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BankAccountsController Test Case
 */
class BankAccountsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bank_accounts',
        'app.banks',
        'app.images',
        'app.orgs',
        'app.bpartners',
        'app.branches',
        'app.invoices',
        'app.orders',
        'app.branchs',
        'app.users',
        'app.roles',
        'app.system_usages',
        'app.warehouses',
        'app.wh_products',
        'app.products',
        'app.product_images',
        'app.serial_numbers'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
