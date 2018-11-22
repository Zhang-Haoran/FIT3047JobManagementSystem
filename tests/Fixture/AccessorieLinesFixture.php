<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccessorieLinesFixture
 *
 */
class AccessorieLinesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'accs_in' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'accs_out' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'loaded' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'accessories_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jobs_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_accessorie_lines_accessories1_idx' => ['type' => 'index', 'columns' => ['accessories_id'], 'length' => []],
            'fk_accessorie_lines_jobs1_idx' => ['type' => 'index', 'columns' => ['jobs_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_accessorie_lines_accessories1' => ['type' => 'foreign', 'columns' => ['accessories_id'], 'references' => ['accessories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_accessorie_lines_jobs1' => ['type' => 'foreign', 'columns' => ['jobs_id'], 'references' => ['jobs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 1,
                'accs_in' => 1,
                'accs_out' => 1,
                'loaded' => 1,
                'accessories_id' => 1,
                'jobs_id' => 1
            ],
        ];
        parent::init();
    }
}
