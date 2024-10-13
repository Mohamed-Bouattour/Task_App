<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Progres> $progress
 */
?>
<div class="progress index content">
    <?php 
    if($role=="admin" || $role=='employee') :
    ?>
    <?= $this->Html->link(__('New Progres'), ['action' => 'add'], ['class' => 'button float-right','style'=>'background-color:blue;']) ?>
    <?php endif; ?>
    <h3><?= __('Progress') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('task_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('new_state','New Status') ?></th>
                    <th><?= $this->Paginator->sort('update_time') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($progress as $progres): ?>
                <tr>
                    <td><?= $this->Number->format($progres->id) ?></td>
                    <td><?= $progres->hasValue('task') ? $this->Html->link($progres->task->name, ['controller' => 'Tasks', 'action' => 'view', $progres->task->id]) : '' ?></td>
                    <td><?= $progres->hasValue('user') ? $this->Html->link($progres->user->name, ['controller' => 'Users', 'action' => 'view', $progres->user->id]) : '' ?></td>
                    <td><?= h($progres->new_state) ?></td>
                    <td><?= h($progres->update_time) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $progres->id]) ?>
                        <?php 
                        if($role=="admin" || $role=='employee') :
                        ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $progres->id]) ?>
                        <?php endif; ?>
                        <?php 
                        if($role=="admin") :
                        ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $progres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $progres->id)]) ?>
                        <?php endif; ?>  
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
