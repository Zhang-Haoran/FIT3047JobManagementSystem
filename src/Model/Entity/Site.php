<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Site Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $suburb
 * @property string $postcode
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Job[] $jobs
 */
class Site extends Entity
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
        'address' => true,
        'suburb' => true,
        'postcode' => true,
        'is_deleted' => true,
        'jobs' => true
    ];

    protected function _getLabel()
    {
        return $this->_properties['name'] . ' (' . $this->_properties['address'] . ',  ' . $this->_properties['suburb'] . ' ' . $this->_properties['postcode'] . ')';
    }
}
