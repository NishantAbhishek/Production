<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoresFixture
 */
class StoresFixture extends TestFixture
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
                'id' => '4958ebf0-56dc-4753-92ab-eea2d04fe214',
                'store_name' => 'Lorem ipsum dolor sit amet',
                'store_address' => 'Lorem ipsum dolor sit amet',
                'store_open' => '12:13:47',
                'store_close' => '12:13:47',
                'store_phone' => '',
            ],
        ];
        parent::init();
    }
}
