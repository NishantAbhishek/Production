<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MovingOrdersStaffsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MovingOrdersStaffsController Test Case
 *
 * @uses \App\Controller\MovingOrdersStaffsController
 */
class MovingOrdersStaffsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MovingOrdersStaffs',
        'app.Staffs',
        'app.MovingOrders',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersStaffsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersStaffsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersStaffsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersStaffsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\MovingOrdersStaffsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
