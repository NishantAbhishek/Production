<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StorageOrder Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $so_order_time
 * @property \Cake\I18n\FrozenTime $so_update
 * @property \Cake\I18n\FrozenDate $so_start
 * @property int $so_duration
 * @property string $so_price
 * @property string $user_id
 * @property string $unit_id
 * @property string $staff_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Staff $staff
 */
class StorageOrder extends Entity
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
        'so_order_time' => true,
        'so_update' => true,
        'so_start' => true,
        'so_duration' => true,
        'so_price' => true,
        'user_id' => true,
        'unit_id' => true,
        'staff_id' => true,
        'user' => true,
        'unit' => true,
        'staff' => true,
    ];
}
