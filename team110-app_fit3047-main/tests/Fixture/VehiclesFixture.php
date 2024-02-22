<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VehiclesFixture
 */
class VehiclesFixture extends TestFixture
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
                'id' => 'cf4d5ef3-a7cc-4b77-a048-9d5264e0fd49',
                'vehicle_rego' => 'Lore',
                'vehicle_type' => 'Lorem ipsum dolor sit amet',
                'vehicle_model' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
