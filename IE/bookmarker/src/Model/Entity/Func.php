<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Func Entity
 *
 * @property int $func_id
 * @property string $func_name
 *
 * @property \App\Model\Entity\Employee[] $employees
 */
class Func extends Entity
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
        'func_name' => true,
        'employees' => true
    ];
}
