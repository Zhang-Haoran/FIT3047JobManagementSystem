<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $stock_id
 * @property string $stock_name
 * @property float $rent_value
 * @property int $min_material
 * @property int $mat_id
 *
 * @property \App\Model\Entity\Material $material
 * @property \App\Model\Entity\Job[] $jobs
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
        'stock_name' => true,
        'rent_value' => true,
        'min_material' => true,
        'mat_id' => true,
        'material' => true,
        'jobs' => true
    ];
}
