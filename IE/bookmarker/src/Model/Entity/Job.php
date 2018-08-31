<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $job_id
 * @property string $job_name
 * @property string $job_status
 * @property \Cake\I18n\FrozenDate $job_date
 * @property \Cake\I18n\FrozenDate $booked_date
 * @property float $price
 * @property float $deposite
 * @property string $order_detail
 * @property \Cake\I18n\FrozenTime $e_arrival_time
 * @property \Cake\I18n\FrozenTime $e_setup_time
 * @property \Cake\I18n\FrozenTime $e_pickup_time
 * @property \Cake\I18n\FrozenDate $e_pickup_date
 * @property string $additional_note
 * @property int $site_id
 * @property int $event_type_id
 * @property int $cust_id
 * @property int $emp_id
 *
 * @property \App\Model\Entity\Site $site
 * @property \App\Model\Entity\EventType $event_type
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Material[] $materials
 * @property \App\Model\Entity\Stock[] $stocks
 */
class Job extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'job_name' => true,
        'job_status' => true,
        'job_date' => true,
        'booked_date' => true,
        'price' => true,
        'deposite' => true,
        'order_detail' => true,
        'e_arrival_time' => true,
        'e_setup_time' => true,
        'e_pickup_time' => true,
        'e_pickup_date' => true,
        'additional_note' => true,
        'site_id' => true,
        'event_type_id' => true,
        'cust_id' => true,
        'emp_id' => true,
        'site' => true,
        'event_type' => true,
        'customer' => true,
        'employee' => true,
        'materials' => true,
        'stocks' => true
    ];
}
