<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MovingOrdersVehiclesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MovingOrdersVehiclesController Test Case
 *
 * @uses \App\Controller\MovingOrdersVehiclesController
 */
class MovingOrdersVehiclesControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersVehiclesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersVehiclesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersVehiclesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersVehiclesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersVehiclesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
