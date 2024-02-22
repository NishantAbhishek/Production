<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InquiriesFixture
 */
class InquiriesFixture extends TestFixture
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
                'id' => 'e4b16de0-5565-4b45-8b65-5c3052704581',
                'inquiry_order_time' => 1694409585,
                'inquiry_update' => 1694409585,
                'inquiry_detail' => 'Lorem ipsum dolor sit amet',
                'inquiry_pickup' => 'Lorem ipsum dolor sit amet',
                'inquiry_dropoff' => 'Lorem ipsum dolor sit amet',
                'inquiry_start_time' => '2023-09-11 05:19:45',
                'inquiry_end_time' => '2023-09-11 05:19:45',
                'inquiry_quote' => 1.5,
                'inquiry_vehicle' => 1,
                'inquiry_staff' => 1,
                'inquiry_reviewed' => 1,
                'inquiry_confirmed' => 1,
                'user_id' => '167a0b69-422d-48af-881d-f57595f19689',
            ],
        ];
        parent::init();
    }
}
