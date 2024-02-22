<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 */
class InvoicesFixture extends TestFixture
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
                'id' => '5ec27a9c-645f-4e31-bcc3-201d4e971db3',
                'reference' => '82bd4ef0-2f7e-4ff3-bfe1-262989d4064f',
                'reference_type' => 'Lorem ipsum dolor sit amet',
                'invoice_amount' => 1.5,
                'invoice_date' => 1696167303,
                'user_id' => '6dcb5ae8-547b-471d-ba46-0e407e676737',
            ],
        ];
        parent::init();
    }
}
