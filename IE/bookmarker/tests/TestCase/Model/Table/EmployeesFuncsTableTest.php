<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeesFuncsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeesFuncsTable Test Case
 */
class EmployeesFuncsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeesFuncsTable
     */
    public $EmployeesFuncs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employees_funcs',
        'app.funcs',
        'app.employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EmployeesFuncs') ? [] : ['className' => EmployeesFuncsTable::class];
        $this->EmployeesFuncs = TableRegistry::getTableLocator()->get('EmployeesFuncs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeesFuncs);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
