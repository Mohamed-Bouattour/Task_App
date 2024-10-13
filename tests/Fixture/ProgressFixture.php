<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProgressFixture
 */
class ProgressFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'progress';
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
                'task_id' => 1,
                'user_id' => 1,
                'new_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'new_state' => 'Lorem ipsum dolor sit amet',
                'update_time' => '2024-06-26 15:56:25',
            ],
        ];
        parent::init();
    }
}
