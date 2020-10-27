<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DogBreedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DogBreedsTable Test Case
 */
class DogBreedsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DogBreedsTable
     */
    public $DogBreeds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DogBreeds',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DogBreeds') ? [] : ['className' => DogBreedsTable::class];
        $this->DogBreeds = TableRegistry::getTableLocator()->get('DogBreeds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DogBreeds);

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
}
