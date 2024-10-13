<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsProgressTasksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsProgressTasksTable Test Case
 */
class ProjectsProgressTasksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsProgressTasksTable
     */
    protected $ProjectsProgressTasks;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ProjectsProgressTasks',
        'app.Projects',
        'app.Tasks',
        'app.Progress',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProjectsProgressTasks') ? [] : ['className' => ProjectsProgressTasksTable::class];
        $this->ProjectsProgressTasks = $this->getTableLocator()->get('ProjectsProgressTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProjectsProgressTasks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProjectsProgressTasksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProjectsProgressTasksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
