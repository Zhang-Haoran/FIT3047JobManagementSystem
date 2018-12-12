<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $phone
 * @property string $email
 * @property string $role
 * @property int $job_id
 * @property int $site_id
 * @property int $customer_id
 * @property bool $is_deleted
 * @property string $street
 * @property string $suburb
 * @property string $city
 * @property string $postcode
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
        'fname' => true,
        'lname' => true,
        'phone' => true,
        'email' => true,
        'role' => true,
        'job_id' => true,
        'site_id' => true,
        'customer_id' => true,
        'is_deleted' => true,
        'street' => true,
        'suburb' => true,
        'city' => true,
        'postcode' => true,
        'job' => true,
        'site' => true,
        'customer' => true
    ];

    protected function _getLabel()
    {
        return $this->_properties['fname'] .' '.$this->_properties['lname']. ' ( ' . $this->_properties['email'] . ' '. ')';
    }

}
