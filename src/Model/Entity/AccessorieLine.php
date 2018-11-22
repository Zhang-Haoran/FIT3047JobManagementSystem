<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccessorieLine Entity
 *
 * @property int $id
 * @property int $accs_in
 * @property int $accs_out
 * @property bool $loaded
 * @property int $accessories_id
 * @property int $jobs_id
 *
 * @property \App\Model\Entity\Accessory $accessory
 * @property \App\Model\Entity\Job $job
 */
class AccessorieLine extends Entity
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
        'accs_in' => true,
        'accs_out' => true,
        'loaded' => true,
        'accessories_id' => true,
        'jobs_id' => true,
        'accessory' => true,
        'job' => true
    ];
}
