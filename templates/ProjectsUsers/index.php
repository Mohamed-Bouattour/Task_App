<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProjectsUser> $projectsUsers
 */
?>
<div class="projectsUsers index content">
    <?= $this->Html->link(__('New Projects User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projectsUsers as $projectsUser): ?>
                <tr>
                    <td><?= $this->Number->format($projectsUser->id) ?></td>
                    <td><?= $projectsUser->hasValue('project') ? $this->Html->link($projectsUser->project->name, ['controller' => 'Projects', 'action' => 'view', $projectsUser->project->id]) : '' ?></td>
                    <td><?= $projectsUser->hasValue('user') ? $this->Html->link($projectsUser->user->name, ['controller' => 'Users', 'action' => 'view', $projectsUser->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectsUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectsUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUser->id)]) ?>
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
