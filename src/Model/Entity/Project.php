<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Cake\I18n\Date $start_date
 * @property \Cake\I18n\Date $end_date
 * @property string $status
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Task[] $tasks
 */
class Project extends Entity
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
        'name' => true,
        'user_id' => true,
        'start_date' => true,
        'end_date' => true,
        'status' => true,
        'users' => true,
        'tasks' => true,
    ];
}
