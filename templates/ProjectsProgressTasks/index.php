<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProjectsProgressTask> $projectsProgressTasks
 */
?>
<div class="projectsProgressTasks index content">
    <?= $this->Html->link(__('New Projects Progress Task'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects Progress Tasks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('task_id') ?></th>
                    <th><?= $this->Paginator->sort('progres_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projectsProgressTasks as $projectsProgressTask): ?>
                <tr>
                    <td><?= $this->Number->format($projectsProgressTask->id) ?></td>
                    <td><?= $projectsProgressTask->hasValue('project') ? $this->Html->link($projectsProgressTask->project->name, ['controller' => 'Projects', 'action' => 'view', $projectsProgressTask->project->id]) : '' ?></td>
                    <td><?= $projectsProgressTask->hasValue('task') ? $this->Html->link($projectsProgressTask->task->name, ['controller' => 'Tasks', 'action' => 'view', $projectsProgressTask->task->id]) : '' ?></td>
                    <td><?= $projectsProgressTask->progres_id === null ? '' : $this->Number->format($projectsProgressTask->progres_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectsProgressTask->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectsProgressTask->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectsProgressTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsProgressTask->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
