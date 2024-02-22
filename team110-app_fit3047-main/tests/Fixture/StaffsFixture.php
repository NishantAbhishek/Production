<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffsFixture
 */
class StaffsFixture extends TestFixture
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
                'id' => '6695ca6d-5f5d-4e02-ac1e-d8920cb68401',
                'staff_name' => 'Lorem ipsum dolor sit amet',
                'staff_phone' => '',
                'staff_email' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
