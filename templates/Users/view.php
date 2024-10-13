<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
            <button class="return" style="background-color:blue; border-radius:50%; padding:25px;"><p style="font-size: 15px; margin-top:-18px"><-</p></button>
        </a>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($user->projects)) : ?>
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
                        <?php foreach ($user->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->name) ?></td>
                            <td><?= h($project->user_id) ?></td>
                            <td><?= h($project->start_date) ?></td>
                            <td><?= h($project->end_date) ?></td>
                            <td><?= h($project->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Progress') ?></h4>
                <?php if (!empty($user->progress)) : ?>
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
                        <?php foreach ($user->progress as $progres) : ?>
                        <tr>
                            <td><?= h($progres->id) ?></td>
                            <td><?= h($progres->task_id) ?></td>
                            <td><?= h($progres->user_id) ?></td>
                            <td><?= h($progres->new_description) ?></td>
                            <td><?= h($progres->new_state) ?></td>
                            <td><?= h($progres->update_time) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Progress', 'action' => 'view', $progres->id]) ?>
                                
                                <?php
                                if($role=="admin" || $role=="employee") :
                                ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Progress', 'action' => 'edit', $progres->id]) ?> 
                                <?php endif; ?>

                                <?php
                                if($role=="admin") :
                                ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Progress', 'action' => 'delete', $progres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $progres->id)]) ?>
                                <?php endif; ?>
                            
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <!--
            inutule car il ya related progress
            <div class="related">
                <h4><?= __('Related Tasks') ?></h4>
                <?php if (!empty($user->tasks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->tasks as $task) : ?>
                        <tr>
                            <td><?= h($task->id) ?></td>
                            <td><?= h($task->name) ?></td>
                            <td><?= h($task->description) ?></td>
                            <td><?= h($task->status) ?></td>
                            <td><?= h($task->user_id) ?></td>
                            <td><?= h($task->start_date) ?></td>
                            <td><?= h($task->end_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $task->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $task->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            -->
        </div>
    </div>
</div>
