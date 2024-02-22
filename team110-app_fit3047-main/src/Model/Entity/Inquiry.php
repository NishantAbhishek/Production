<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inquiry Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $inquiry_order_time
 * @property \Cake\I18n\FrozenTime $inquiry_update
 * @property string $inquiry_detail
 * @property string $inquiry_pickup
 * @property string|null $inquiry_dropoff
 * @property \Cake\I18n\FrozenTime|null $inquiry_start_time
 * @property \Cake\I18n\FrozenTime|null $inquiry_end_time
 * @property string|null $inquiry_quote
 * @property int|null $inquiry_vehicle
 * @property int|null $inquiry_staff
 * @property bool|null $inquiry_reviewed
 * @property bool|null $inquiry_confirmed
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Inquiry extends Entity
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
        'inquiry_order_time' => true,
        'inquiry_update' => true,
        'inquiry_detail' => true,
        'inquiry_pickup' => true,
        'inquiry_dropoff' => true,
        'inquiry_start_time' => true,
        'inquiry_end_time' => true,
        'inquiry_quote' => true,
        'inquiry_vehicle' => true,
        'inquiry_staff' => true,
        'inquiry_reviewed' => true,
        'inquiry_confirmed' => true,
        'user_id' => true,
        'user' => true,
    ];
}
