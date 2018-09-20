<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustTypesTable Test Case
 */
class CustTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustTypesTable
     */
    public $CustTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cust_types',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CustTypes') ? [] : ['className' => CustTypesTable::class];
        $this->CustTypes = TableRegistry::getTableLocator()->get('CustTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustTypes);

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
