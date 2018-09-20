<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccessorieLinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccessorieLinesTable Test Case
 */
class AccessorieLinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccessorieLinesTable
     */
    public $AccessorieLines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.accessorie_lines',
        'app.accessories',
        'app.jobs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AccessorieLines') ? [] : ['className' => AccessorieLinesTable::class];
        $this->AccessorieLines = TableRegistry::getTableLocator()->get('AccessorieLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccessorieLines);

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
