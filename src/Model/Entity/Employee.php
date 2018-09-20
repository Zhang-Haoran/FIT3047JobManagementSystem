<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $password
 * @property string $phone
 * @property string $email
 * @property int $access_level
 * @property string $token
 * @property \Cake\I18n\FrozenTime $timeout
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Job[] $jobs
 */
class Employee extends Entity
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
        'password' => true,
        'phone' => true,
        'email' => true,
        'access_level' => true,
        'token' => true,
        'timeout' => true,
        'is_deleted' => true,
        'jobs' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];
}
