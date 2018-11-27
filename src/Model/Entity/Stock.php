<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $id
 * @property string $name
 * @property float $rent_value
 * @property int $min_accs
 * @property int $accessorie_id
 * @property bool $is_deleted
 * @property int $unit
 *
 * @property \App\Model\Entity\Accessory $accessory
 */
class Stock extends Entity
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
        'rent_value' => true,
        'min_accs' => true,
        'accessorie_id' => true,
        'is_deleted' => true,
        'unit' => true,
        'accessory' => true
    ];
}
