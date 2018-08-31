<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $image_id
 * @property string $image_path
 * @property string $image_descrp
 * @property int $job_id
 *
 * @property \App\Model\Entity\Job $job
 */
class Image extends Entity
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
        'image_path' => true,
        'image_descrp' => true,
        'job_id' => true,
        'job' => true
    ];
}
