<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobsFixture
 *
 */
class JobsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'job_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'job_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'job_status' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'job_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'booked_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'price' => ['type' => 'float', 'length' => 0, 'precision' => 0, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => ''],
        'deposit' => ['type' => 'float', 'length' => 0, 'precision' => 0, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => ''],
        'order_detail' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'e_arrival_time' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'e_setup_time' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'e_pickup_time' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'e_pickup_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'additional_note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'site_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'event_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cust_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'emp_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_jobs_sites_idx' => ['type' => 'index', 'columns' => ['site_id'], 'length' => []],
            'fk_jobs_event_types1_idx' => ['type' => 'index', 'columns' => ['event_type_id'], 'length' => []],
            'fk_jobs_customers1_idx' => ['type' => 'index', 'columns' => ['cust_id'], 'length' => []],
            'fk_jobs_employees1_idx' => ['type' => 'index', 'columns' => ['emp_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['job_id'], 'length' => []],
            'fk_jobs_customers1' => ['type' => 'foreign', 'columns' => ['cust_id'], 'references' => ['customers', 'cust_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_jobs_employees1' => ['type' => 'foreign', 'columns' => ['emp_id'], 'references' => ['employees', 'emp_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_jobs_event_types1' => ['type' => 'foreign', 'columns' => ['event_type_id'], 'references' => ['event_types', 'event_type_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_jobs_sites' => ['type' => 'foreign', 'columns' => ['site_id'], 'references' => ['sites', 'site_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'job_id' => 1,
                'job_name' => 'Lorem ipsum dolor sit amet',
                'job_status' => 'Lorem ipsum dolor sit amet',
                'job_date' => '2018-09-04',
                'booked_date' => '2018-09-04',
                'price' => 1,
                'deposit' => 1,
                'order_detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'e_arrival_time' => '05:26:48',
                'e_setup_time' => '05:26:48',
                'e_pickup_time' => '05:26:48',
                'e_pickup_date' => '2018-09-04',
                'additional_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'site_id' => 1,
                'event_type_id' => 1,
                'cust_id' => 1,
                'emp_id' => 1
            ],
        ];
        parent::init();
    }
}
