<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContactFormsFixture
 */
class ContactFormsFixture extends TestFixture
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
                'id' => '9a3f446d-b9d1-4f42-a28b-0a89b2a664a9',
                'contact_name' => 'Lorem ipsum dolor sit amet',
                'contact_email' => 'Lorem ipsum dolor sit amet',
                'contact_phone' => '',
                'contact_msg' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'contact_replied' => 1,
            ],
        ];
        parent::init();
    }
}
