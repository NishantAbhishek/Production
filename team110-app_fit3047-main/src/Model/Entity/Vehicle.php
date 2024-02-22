<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicle Entity
 *
 * @property string $id
 * @property string $vehicle_rego
 * @property string $vehicle_type
 * @property string|null $vehicle_model
 *
 * @property \App\Model\Entity\MovingOrder[] $moving_orders
 */
class Vehicle extends Entity
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
        'vehicle_rego' => true,
        'vehicle_type' => true,
        'vehicle_model' => true,
        'moving_orders' => true,
    ];
}
