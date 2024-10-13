<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Progres Entity
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string $new_description
 * @property string $new_state
 * @property \Cake\I18n\DateTime $update_time
 *
 * @property \App\Model\Entity\Task $task
 * @property \App\Model\Entity\User $user
 */
class Progres extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'task_id' => true,
        'user_id' => true,
        'new_description' => true,
        'new_state' => true,
        'update_time' => true,
        'task' => true,
        'user' => true,
    ];
}
