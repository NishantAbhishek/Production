<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unit Entity
 *
 * @property string $id
 * @property string $unit_no
 * @property string $unit_area
 * @property string|null $unit_type
 * @property string $unit_price
 * @property string|null $unit_desc
 * @property bool|null $unit_avail
 * @property string $store_id
 *
 * @property \App\Model\Entity\Store $store
 * @property \App\Model\Entity\StorageOrder[] $storage_orders
 */
class Unit extends Entity
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
        'unit_no' => true,
        'unit_area' => true,
        'unit_type' => true,
        'unit_price' => true,
        'unit_desc' => true,
        'unit_avail' => true,
        'store_id' => true,
        'store' => true,
        'storage_orders' => true,
    ];
}
