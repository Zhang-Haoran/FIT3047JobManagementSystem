<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StockLine Entity
 *
 * @property int $id
 * @property int $stock_num
 * @property bool $loaded
 * @property int $stocks_id
 * @property int $jobs_id
 *
 * @property \App\Model\Entity\Stock $stock
 * @property \App\Model\Entity\Job $job
 */
class StockLine extends Entity
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
        'stock_num' => true,
        'loaded' => true,
        'stocks_id' => true,
        'jobs_id' => true,
        'stock' => true,
        'job' => true
    ];
}
