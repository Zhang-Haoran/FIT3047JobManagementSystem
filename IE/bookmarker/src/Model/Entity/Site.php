<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Site Entity
 *
 * @property int $site_id
 * @property string $site_name
 * @property string $site_address
 * @property string $site_suburb
 * @property string $site_postcode
 * @property string $site_melways
 * @property string $site_contact
 * @property string $site_mobile
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
        'site_name' => true,
        'site_address' => true,
        'site_suburb' => true,
        'site_postcode' => true,
        'site_melways' => true,
        'site_contact' => true,
        'site_mobile' => true
    ];
}
