<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StorageOrdersFixture
 */
class StorageOrdersFixture extends TestFixture
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
                'id' => '2a47c8ea-0131-4fc2-8289-4b62b3869f78',
                'so_order_time' => 1696007932,
                'so_update' => 1696007932,
                'so_start' => '2023-09-29',
                'so_duration' => 1,
                'so_price' => 1.5,
                'user_id' => '19279d4b-c289-49e6-be8b-f25e7c8bf760',
                'unit_id' => '5991cd3b-f8db-49a0-8cea-00db4f7a69df',
                'staff_id' => 'bc153737-0681-4a74-bab5-1eab69d4196a',
            ],
        ];
        parent::init();
    }
}
