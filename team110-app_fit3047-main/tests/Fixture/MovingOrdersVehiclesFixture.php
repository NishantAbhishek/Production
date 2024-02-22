<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovingOrdersVehiclesFixture
 */
class MovingOrdersVehiclesFixture extends TestFixture
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
                'id' => '1206d7f0-c777-4095-a9f4-59f7d6f8f174',
                'mo_vehicle_status' => 'Lorem ipsum dolor sit amet',
                'mo_vehicle_update' => 1693829618,
                'vehicle_id' => '8d928853-e302-49a5-9dd4-7257644cd6d0',
                'moving_order_id' => '52c7c4c2-5059-4b99-a5d1-b7aed888a2d2',
            ],
        ];
        parent::init();
    }
}
