<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuncsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuncsTable Test Case
 */
class FuncsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FuncsTable
     */
    public $Funcs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Funcs') ? [] : ['className' => FuncsTable::class];
        $this->Funcs = TableRegistry::getTableLocator()->get('Funcs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Funcs);

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
