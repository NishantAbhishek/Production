<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Store Entity
 *
 * @property string $id
 * @property string $store_name
 * @property string $store_address
 * @property \Cake\I18n\Time $store_open
 * @property \Cake\I18n\Time $store_close
 * @property string $store_phone
 *
 * @property \App\Model\Entity\Unit[] $units
 */
class Store extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'store_name' => true,
        'store_address' => true,
        'store_open' => true,
        'store_close' => true,
        'store_phone' => true,
        'units' => true,
    ];
}
