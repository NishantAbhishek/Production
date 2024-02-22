<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovingOrdersVehiclesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovingOrdersVehiclesTable Test Case
 */
class MovingOrdersVehiclesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovingOrdersVehiclesTable
     */
    protected $MovingOrdersVehicles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MovingOrdersVehicles',
        'app.Vehicles',
        'app.MovingOrders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MovingOrdersVehicles') ? [] : ['className' => MovingOrdersVehiclesTable::class];
        $this->MovingOrdersVehicles = $this->getTableLocator()->get('MovingOrdersVehicles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MovingOrdersVehicles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MovingOrdersVehiclesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MovingOrdersVehiclesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
