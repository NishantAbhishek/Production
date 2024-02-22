<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MovingOrder Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $mo_order_time
 * @property \Cake\I18n\FrozenTime $mo_update
 * @property string $mo_detail
 * @property string $mo_pickup
 * @property string|null $mo_dropoff
 * @property \Cake\I18n\FrozenTime|null $mo_start_time
 * @property \Cake\I18n\FrozenTime|null $mo_end_time
 * @property string|null $mo_quote
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Staff[] $staffs
 * @property \App\Model\Entity\Vehicle[] $vehicles
 */
class MovingOrder extends Entity
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
        'mo_order_time' => true,
        'mo_update' => true,
        'mo_detail' => true,
        'mo_pickup' => true,
        'mo_dropoff' => true,
        'mo_start_time' => true,
        'mo_end_time' => true,
        'mo_quote' => true,
        'user_id' => true,
        'user' => true,
        'staffs' => true,
        'vehicles' => true,
    ];
}
