<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockLinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockLinesTable Test Case
 */
class StockLinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StockLinesTable
     */
    public $StockLines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stock_lines',
        'app.stocks',
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
        $config = TableRegistry::getTableLocator()->exists('StockLines') ? [] : ['className' => StockLinesTable::class];
        $this->StockLines = TableRegistry::getTableLocator()->get('StockLines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StockLines);

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
