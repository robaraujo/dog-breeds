<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DogPositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DogPositionsTable Test Case
 */
class DogPositionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DogPositionsTable
     */
    public $DogPositions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DogPositions',
        'app.DogBreeds',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DogPositions') ? [] : ['className' => DogPositionsTable::class];
        $this->DogPositions = TableRegistry::getTableLocator()->get('DogPositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DogPositions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
