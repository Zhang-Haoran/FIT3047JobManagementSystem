<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MaterialLinesFixture
 *
 */
class MaterialLinesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'material_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'job_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mat_in' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mat_out' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_materials_has_jobs_jobs1_idx' => ['type' => 'index', 'columns' => ['job_id'], 'length' => []],
            'fk_materials_has_jobs_materials1_idx' => ['type' => 'index', 'columns' => ['material_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['material_id', 'job_id'], 'length' => []],
            'fk_materials_has_jobs_jobs1' => ['type' => 'foreign', 'columns' => ['job_id'], 'references' => ['jobs', 'job_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_materials_has_jobs_materials1' => ['type' => 'foreign', 'columns' => ['material_id'], 'references' => ['materials', 'material_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'material_id' => 1,
                'job_id' => 1,
                'mat_in' => 1,
                'mat_out' => 1
            ],
        ];
        parent::init();
    }
}
