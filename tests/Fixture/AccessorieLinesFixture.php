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
        'accessorie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'job_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'accs_in' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'accs_out' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_materials_has_jobs_jobs1_idx' => ['type' => 'index', 'columns' => ['job_id'], 'length' => []],
            'fk_materials_has_jobs_materials1_idx' => ['type' => 'index', 'columns' => ['accessorie_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['accessorie_id', 'job_id'], 'length' => []],
            'fk_materials_has_jobs_jobs1' => ['type' => 'foreign', 'columns' => ['job_id'], 'references' => ['jobs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_materials_has_jobs_materials1' => ['type' => 'foreign', 'columns' => ['accessorie_id'], 'references' => ['accessories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'accessorie_id' => 1,
                'job_id' => 1,
                'accs_in' => 1,
                'accs_out' => 1
            ],
        ];
        parent::init();
    }
}
