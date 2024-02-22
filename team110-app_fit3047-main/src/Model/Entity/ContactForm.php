<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactForm Entity
 *
 * @property string $id
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_phone
 * @property string $contact_msg
 * @property bool|null $contact_replied
 */
class ContactForm extends Entity
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
        'contact_name' => true,
        'contact_email' => true,
        'contact_phone' => true,
        'contact_msg' => true,
        'contact_replied' => true,
    ];
}
