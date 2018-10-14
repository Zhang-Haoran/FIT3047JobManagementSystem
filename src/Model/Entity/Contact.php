<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $role
 * @property int $jobs_id
 * @property int $sites_id
 * @property int $customers_id
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Site $site
 * @property \App\Model\Entity\Customer $customer
 */
class Contact extends Entity
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
        'name' => true,
        'phone' => true,
        'email' => true,
        'role' => true,
        'jobs_id' => true,
        'sites_id' => true,
        'customers_id' => true,
        'is_deleted' => true,
        'job' => true,
        'site' => true,
        'customer' => true
    ];
}
