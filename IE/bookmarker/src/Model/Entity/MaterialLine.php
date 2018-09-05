<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaterialLine Entity
 *
 * @property int $material_id
 * @property int $job_id
 * @property int $mat_in
 * @property int $mat_out
 *
 * @property \App\Model\Entity\Material $material
 * @property \App\Model\Entity\Job $job
 */
class MaterialLine extends Entity
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
        'mat_in' => true,
        'mat_out' => true,
        'material' => true,
        'job' => true
    ];
}
