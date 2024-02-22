<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovingOrdersStaffsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovingOrdersStaffsTable Test Case
 */
class MovingOrdersStaffsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovingOrdersStaffsTable
     */
    protected $MovingOrdersStaffs;

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
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MovingOrdersStaffs') ? [] : ['className' => MovingOrdersStaffsTable::class];
        $this->MovingOrdersStaffs = $this->getTableLocator()->get('MovingOrdersStaffs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MovingOrdersStaffs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MovingOrdersStaffsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MovingOrdersStaffsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
