<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovingOrdersFixture
 */
class MovingOrdersFixture extends TestFixture
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
                'id' => '9ef85bad-6f0e-4cf9-820a-a4b4181a4d5e',
                'mo_order_time' => 1693829435,
                'mo_update' => 1693829435,
                'mo_detail' => 'Lorem ipsum dolor sit amet',
                'mo_pickup' => 'Lorem ipsum dolor sit amet',
                'mo_dropoff' => 'Lorem ipsum dolor sit amet',
                'mo_start_time' => '2023-09-04 12:10:35',
                'mo_end_time' => '2023-09-04 12:10:35',
                'mo_quote' => 1.5,
                'user_id' => '09878ff9-b84a-4181-9460-c96d5a3de454',
            ],
        ];
        parent::init();
    }
}
