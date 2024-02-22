<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StorageOrdersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StorageOrdersTable Test Case
 */
class StorageOrdersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StorageOrdersTable
     */
    protected $StorageOrders;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.StorageOrders',
        'app.Users',
        'app.Units',
        'app.Staffs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StorageOrders') ? [] : ['className' => StorageOrdersTable::class];
        $this->StorageOrders = $this->getTableLocator()->get('StorageOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StorageOrders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StorageOrdersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StorageOrdersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
