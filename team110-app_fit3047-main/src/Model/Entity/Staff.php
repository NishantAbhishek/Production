<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Staff Entity
 *
 * @property string $id
 * @property string $staff_name
 * @property string $staff_phone
 * @property string $staff_email
 *
 * @property \App\Model\Entity\StorageOrder[] $storage_orders
 * @property \App\Model\Entity\MovingOrder[] $moving_orders
 */
class Staff extends Entity
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
        'staff_name' => true,
        'staff_phone' => true,
        'staff_email' => true,
        'storage_orders' => true,
        'moving_orders' => true,
    ];
}
