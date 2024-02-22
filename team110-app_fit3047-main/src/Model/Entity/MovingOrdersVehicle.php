<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MovingOrdersVehicle Entity
 *
 * @property string $id
 * @property string|null $mo_vehicle_status
 * @property \Cake\I18n\FrozenTime $mo_vehicle_update
 * @property string $vehicle_id
 * @property string $moving_order_id
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\MovingOrder $moving_order
 */
class MovingOrdersVehicle extends Entity
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
        'mo_vehicle_status' => true,
        'mo_vehicle_update' => true,
        'vehicle_id' => true,
        'moving_order_id' => true,
        'vehicle' => true,
        'moving_order' => true,
    ];
}
