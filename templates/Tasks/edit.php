<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $projects
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
        <div class="tasks form content">
            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Edit Task') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('status', [
                        'type' => 'select',
                        'multiple' => false, 
                        'options' => $statusOptions = [
                            'Not Started' => 'Not Started',
                            'In Progress' => 'In Progress',
                            'Completed' => 'Completed',
                            'On Hold' => 'On Hold',
                            'Cancelled' => 'Cancelled',
                        ]
                    ]);
                    //echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    //echo $this->Form->control('projects._ids', ['options' => $projects]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['style'=>'background-color:blue;']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
