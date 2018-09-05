<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StockLinesFixture
 *
 */
class StockLinesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'stock_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'job_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stock_num' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_stocks_has_jobs_jobs1_idx' => ['type' => 'index', 'columns' => ['job_id'], 'length' => []],
            'fk_stocks_has_jobs_stocks1_idx' => ['type' => 'index', 'columns' => ['stock_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['stock_id', 'job_id'], 'length' => []],
            'fk_stocks_has_jobs_jobs1' => ['type' => 'foreign', 'columns' => ['job_id'], 'references' => ['jobs', 'job_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_stocks_has_jobs_stocks1' => ['type' => 'foreign', 'columns' => ['stock_id'], 'references' => ['stocks', 'stock_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'stock_id' => 1,
                'job_id' => 1,
                'stock_num' => 1
            ],
        ];
        parent::init();
    }
}
