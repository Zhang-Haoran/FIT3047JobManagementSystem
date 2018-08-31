<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $emp_id
 * @property string $emp_name
 * @property string $emp_username
 * @property string $emp_password
 * @property string $emp_phone
 * @property string $emp_email
 *
 * @property \App\Model\Entity\Func[] $funcs
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
        'emp_name' => true,
        'emp_username' => true,
        'emp_password' => true,
        'emp_phone' => true,
        'emp_email' => true,
        'funcs' => true
    ];
}
