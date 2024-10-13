<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectsProgressTask $projectsProgressTask
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Projects Progress Task'), ['action' => 'edit', $projectsProgressTask->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Projects Progress Task'), ['action' => 'delete', $projectsProgressTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsProgressTask->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects Progress Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Projects Progress Task'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectsProgressTasks view content">
            <h3><?= h($projectsProgressTask->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $projectsProgressTask->hasValue('project') ? $this->Html->link($projectsProgressTask->project->name, ['controller' => 'Projects', 'action' => 'view', $projectsProgressTask->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Task') ?></th>
                    <td><?= $projectsProgressTask->hasValue('task') ? $this->Html->link($projectsProgressTask->task->name, ['controller' => 'Tasks', 'action' => 'view', $projectsProgressTask->task->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($projectsProgressTask->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Progres Id') ?></th>
                    <td><?= $projectsProgressTask->progres_id === null ? '' : $this->Number->format($projectsProgressTask->progres_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
