<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <a href="<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'index']) ?>">
                <button class="return" style="background-color:blue; border-radius:50%; padding:25px;"><p style="font-size: 15px; margin-top:-18px"><-</p></button>
            </a>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tasks view content">
            <h3><?= h($task->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($task->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($task->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($task->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator ID') ?></th>
                    <td><?= $task->hasValue('user') ? $this->Html->link($task->user->id, ['controller' => 'Users', 'action' => 'view', $task->user->id]) : '' ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($task->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($task->end_date) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($task->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($task->projects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($task->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->name) ?></td>
                            <td><?= h($project->user_id) ?></td>
                            <td><?= h($project->start_date) ?></td>
                            <td><?= h($project->end_date) ?></td>
                            <td><?= h($project->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?php
                                    if($role=="admin" || $role=='chef') :
                                ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Progress') ?></h4>
                <?php if (!empty($task->progress)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Task Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('New Description') ?></th>
                            <th><?= __('New State') ?></th>
                            <th><?= __('Update Time') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($task->progress as $progres) : ?>
                        <tr>
                            <td><?= h($progres->id) ?></td>
                            <td><?= h($progres->task_id) ?></td>
                            <td><?= h($progres->user_id) ?></td>
                            <td><?= h($progres->new_description) ?></td>
                            <td><?= h($progres->new_state) ?></td>
                            <td><?= h($progres->update_time) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Progress', 'action' => 'view', $progres->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Progress', 'action' => 'edit', $progres->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Progress', 'action' => 'delete', $progres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $progres->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
