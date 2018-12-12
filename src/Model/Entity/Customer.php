<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $name
 * @property int $cust_type_id
 * @property bool $is_deleted
 * @property bool $is_business
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $suburb
 * @property string $city
 * @property string $postcode
 *
 * @property \App\Model\Entity\CustType $cust_type
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Job[] $jobs
 */
class Customer extends Entity
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
        'cust_type_id' => true,
        'is_deleted' => true,
        'is_business' => true,
        'phone' => true,
        'email' => true,
        'address' => true,
        'suburb' => true,
        'city' => true,
        'postcode' => true,
        'cust_type' => true,
        'contacts' => true,
        'jobs' => true
    ];
}
