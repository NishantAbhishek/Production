<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $id
 * @property string $user_name
 * @property string $email
 * @property string $password
 * @property string|null $nonce
 * @property \Cake\I18n\FrozenTime|null $nonce_expiry
 * @property string $user_phone
 * @property string $user_type
 * @property string $user_level
 * @property string|null $user_company
 *
 * @property \App\Model\Entity\MovingOrder[] $moving_orders
 * @property \App\Model\Entity\StorageOrder[] $storage_orders
 *  * @property \App\Model\Entity\Inquiry[] $inquiries
 *  * @property \App\Model\Entity\Invoice[] $invoices
 */
class User extends Entity
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
        'user_name' => true,
        'email' => true,
        'password' => true,
        'nonce' => true,
        'nonce_expiry' => true,
        'user_phone' => true,
        'user_type' => true,
        'user_level' => true,
        'user_company' => true,
        'moving_orders' => true,
        'storage_orders' => true,
        'inquiries' => true,
        'invoices' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    /**
     * Hashing password for User entity
     * @param string $password Password field
     * @return string|null hashed password
     */

    protected function _setPassword(string $password): ?string {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return $password;
    }

}
