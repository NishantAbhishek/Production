<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * ContentBlocks seed.
 */
class ContentBlocksSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'parent' => 'global',
                'label' => 'Website Title',
                'description' => 'Shown on the home page, as well as any tabs in the browser.',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'Moving Easy',
            ],
            [
                'parent' => 'global',
                'label' => 'Location or Headquarter',
                'description' => 'Were is the main Headquarter of this Company.',
                'slug' => 'company-headquarter',
                'type' => 'text',
                'value' => '20 Exhibition Walk, Clayton VIC 3168',
            ],
            [
                'parent' => 'global',
                'label' => 'CopyRight Message',
                'description' => 'Shown in copyright Page or any Other pages.',
                'slug' => 'website-copyright-text',
                'type' => 'text',
                'value' => 'Copyright © Moving Easy',
            ],
            [
                'parent' => 'global',
                'label' => 'City running in',
                'description' => 'Which city does this work on.',
                'slug' => 'city-running-in',
                'type' => 'text',
                'value' => 'We are Moving and storing services. We run in Melbourne and provide fast services.',
            ],
            [
                'parent' => 'home',
                'label' => 'Welcome Message',
                'description' => 'Welcome Message shown in Home Page.',
                'slug' => 'welcome-message',
                'type' => 'text',
                'value' => 'Welcome To Moving Easy!',
            ],
            [
                'parent' => 'home',
                'label' => 'Storage Description.',
                'description' => 'Storage Description in Home Page..',
                'slug' => 'storage-description',
                'type' => 'text',
                'value' => 'We store your good for any number of days you want. It will be safely stored with us. Try the storage service now.',
            ],
            [
                'parent' => 'home',
                'label' => 'Transport Description.',
                'description' => 'Transport Description in Home Page..',
                'slug' => 'transport-description',
                'type' => 'text',
                'value' => 'We will transport you heavy goods between far location, try now.',
            ],
            [
                'parent' => 'home',
                'label' => 'Removal Description.',
                'description' => 'Transport Description in Home Page..',
                'slug' => 'removal-description',
                'type' => 'text',
                'value' => 'We also help in removal of items from houses. Try now.',
            ],
            [
                'parent' => 'review',
                'label' => 'Review Alex Smith.',
                'description' => 'Home Page Review by Alex Smith',
                'slug' => 'review-1',
                'type' => 'text',
                'value' => 'What a great transport service provided by them.
                Everything was really smooth and we got all the updates as needed.
                Will totally recommend this system to others.',
            ],
            [
                'parent' => 'review',
                'label' => 'Review Sophia T.',
                'description' => 'Home Page Review by Alex Smith',
                'slug' => 'review-2',
                'type' => 'text',
                'value' => 'Thanks for storing our old items. It really saved lot of space at home.
                 Highly recommended company. See you soooooon. Expecting to work in the future.',
            ],
            [
                'parent' => 'review',
                'label' => 'Review Mike Vincent.',
                'description' => 'Home Page Review by Alex Smith',
                'slug' => 'review-3',
                'type' => 'text',
                'value' => 'Smooth people to talk to, Easy update, fast services etc etc etc. I will say one thing, this business knows what they are doing, and we love it. Thanks.
                 Highly recommended company. See you soooooon. Expecting to work in the future.',
            ],
            [
                'parent' => 'contact_us',
                'label' => 'phone number',
                'description' => 'Company Phone Number',
                'slug' => 'company-phone',
                'type' => 'text',
                'value' => '+61-987654321',
            ],
            [
                'parent' => 'contact_us',
                'label' => 'email id',
                'description' => 'Company Email',
                'slug' => 'company-email',
                'type' => 'text',
                'value' => 'info@movingeasy.com',
            ],
            [
                'parent' => 'contact_us',
                'label' => 'Storage Store 1',
                'description' => 'Store 1 Address',
                'slug' => 'store-1-address',
                'type' => 'text',
                'value' => '6 Westall, Clayton Road, Victoria',
            ],
            [
                'parent' => 'contact_us',
                'label' => 'Storage Store 2',
                'description' => 'Store 1 Address',
                'slug' => 'store-2-address',
                'type' => 'text',
                'value' => '6 Florence Avenue, Clayton.',
            ]
        ];
        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
