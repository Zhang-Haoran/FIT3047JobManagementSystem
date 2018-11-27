<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StocklinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StocklinesTable Test Case
 */
class StocklinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StocklinesTable
     */
    public $Stocklines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stocklines',
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
        $config = TableRegistry::getTableLocator()->exists('Stocklines') ? [] : ['className' => StocklinesTable::class];
        $this->Stocklines = TableRegistry::getTableLocator()->get('Stocklines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stocklines);

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
