<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '8ddae4ad-dfef-406d-9d07-3be1ea21e6b4',
                'user_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'nonce' => 'Lorem ipsum dolor sit amet',
                'nonce_expiry' => '2023-09-04 12:12:14',
                'user_phone' => '',
                'user_type' => 'Lorem ipsum dolor sit amet',
                'user_level' => 'Lorem ipsum dolor sit amet',
                'user_company' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
