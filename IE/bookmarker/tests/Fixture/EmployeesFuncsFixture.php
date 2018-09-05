<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeesFuncsFixture
 *
 */
class EmployeesFuncsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'func_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_funcs_has_employees_employees1_idx' => ['type' => 'index', 'columns' => ['employee_id'], 'length' => []],
            'fk_funcs_has_employees_funcs1_idx' => ['type' => 'index', 'columns' => ['func_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['func_id', 'employee_id'], 'length' => []],
            'fk_funcs_has_employees_employees1' => ['type' => 'foreign', 'columns' => ['employee_id'], 'references' => ['employees', 'employee_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_funcs_has_employees_funcs1' => ['type' => 'foreign', 'columns' => ['func_id'], 'references' => ['funcs', 'func_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'func_id' => 1,
                'employee_id' => 1
            ],
        ];
        parent::init();
    }
}
