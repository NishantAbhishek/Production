<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovingOrdersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovingOrdersTable Test Case
 */
class MovingOrdersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovingOrdersTable
     */
    protected $MovingOrders;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MovingOrders',
        'app.Users',
        'app.Staffs',
        'app.Vehicles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MovingOrders') ? [] : ['className' => MovingOrdersTable::class];
        $this->MovingOrders = $this->getTableLocator()->get('MovingOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MovingOrders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MovingOrdersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MovingOrdersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
