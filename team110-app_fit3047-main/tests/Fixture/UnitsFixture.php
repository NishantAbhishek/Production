<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UnitsFixture
 */
class UnitsFixture extends TestFixture
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
                'id' => '85524900-ff23-40d1-9ba2-07bd405675b0',
                'unit_no' => 'Lor',
                'unit_area' => 1.5,
                'unit_type' => 'Lorem ipsum dolor sit amet',
                'unit_price' => 1.5,
                'unit_desc' => 'Lorem ipsum dolor sit amet',
                'unit_avail' => 1,
                'store_id' => 'b6b47ef3-10c9-4461-9309-f4e7ea926f93',
            ],
        ];
        parent::init();
    }
}
