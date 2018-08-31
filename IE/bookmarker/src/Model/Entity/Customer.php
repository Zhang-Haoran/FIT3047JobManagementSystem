<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $cust_id
 * @property string $cust_name
 * @property string $cust_contact
 * @property string $cust_phone
 * @property string $cust_mobile
 * @property string $cust_email
 * @property int $cust_type_id
 *
 * @property \App\Model\Entity\CustType $cust_type
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
        'cust_name' => true,
        'cust_contact' => true,
        'cust_phone' => true,
        'cust_mobile' => true,
        'cust_email' => true,
        'cust_type_id' => true,
        'cust_type' => true
    ];
}
