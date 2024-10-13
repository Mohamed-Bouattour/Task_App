<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property int $user_id
 * @property \Cake\I18n\Date $start_date
 * @property \Cake\I18n\Date $end_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Progres[] $progress
 * @property \App\Model\Entity\Project[] $projects
 */
class Task extends Entity
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
        'description' => true,
        'status' => true,
        'user_id' => true,
        'start_date' => true,
        'end_date' => true,
        'user' => true,
        'progress' => true,
        'projects' => true,
    ];
}
