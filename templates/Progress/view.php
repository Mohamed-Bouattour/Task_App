<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progres $progres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <a href="<?= $this->Url->build(['controller' => 'Progress', 'action' => 'index']) ?>">
                <button class="return" style="background-color:blue; border-radius:50%; padding:25px;"><p style="font-size: 15px; margin-top:-18px"><-</p></button>
            </a>
        </div>
    </aside>
    <div class="column column-80">
        <div class="progress view content">
            <h3><?= h($progres->new_state) ?></h3>
            <table>
                <tr>
                    <th><?= __('Task') ?></th>
                    <td><?= $progres->hasValue('task') ? $this->Html->link($progres->task->name, ['controller' => 'Tasks', 'action' => 'view', $progres->task->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $progres->hasValue('user') ? $this->Html->link($progres->user->name, ['controller' => 'Users', 'action' => 'view', $progres->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('New State') ?></th>
                    <td><?= h($progres->new_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($progres->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Time') ?></th>
                    <td><?= h($progres->update_time) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('New Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($progres->new_description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
