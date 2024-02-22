<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovingOrdersStaffsFixture
 */
class MovingOrdersStaffsFixture extends TestFixture
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
                'id' => 'c22735f9-b7a4-4065-8410-dcf9e77d6284',
                'mo_staff_status' => 'Lorem ipsum dolor sit amet',
                'mo_staff_update' => 1693829600,
                'staff_id' => 'f4c965be-bdf9-43ec-8c32-124d656d7245',
                'moving_order_id' => '3c6c7fdc-0fdb-420b-bd88-86b84688aa7e',
            ],
        ];
        parent::init();
    }
}
