<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progres $progres
 * @var \Cake\Collection\CollectionInterface|string[] $tasks
 * @var \Cake\Collection\CollectionInterface|string[] $users
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
        <div class="progress form content">
            <?= $this->Form->create($progres) ?>
            <fieldset>
                <legend><?= __('Add Progres') ?></legend>
                <?php
                    echo $this->Form->control('task_id', ['options' => $tasks]);
                    //echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('new_description');
                    echo $this->Form->control('new_state', [
                        'type' => 'select',
                        'multiple' => false, 
                        'options' => $stateOptions = [
                            'Not Started' => 'Not Started',
                            'In Progress' => 'In Progress',
                            'Completed' => 'Completed',
                            'On Hold' => 'On Hold',
                            'Cancelled' => 'Cancelled',
                        ]
                    ]);
                    //echo $this->Form->control('update_time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['style'=>'background-color:blue;']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
