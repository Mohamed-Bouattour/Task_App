<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsProgressTasksFixture
 */
class ProjectsProgressTasksFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'project_id' => 1,
                'task_id' => 1,
                'progres_id' => 1,
            ],
        ];
        parent::init();
    }
}
