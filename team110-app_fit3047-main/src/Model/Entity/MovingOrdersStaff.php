<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MovingOrdersStaff Entity
 *
 * @property string $id
 * @property string|null $mo_staff_status
 * @property \Cake\I18n\FrozenTime $mo_staff_update
 * @property string $staff_id
 * @property string $moving_order_id
 *
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\MovingOrder $moving_order
 */
class MovingOrdersStaff extends Entity
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
        'mo_staff_status' => true,
        'mo_staff_update' => true,
        'staff_id' => true,
        'moving_order_id' => true,
        'staff' => true,
        'moving_order' => true,
    ];
}
