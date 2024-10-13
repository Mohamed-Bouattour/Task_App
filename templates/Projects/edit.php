<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>">
                <button class="return" style="background-color:blue; border-radius:50%; padding:25px;"><p style="font-size: 15px; margin-top:-18px"><-</p></button>
            </a>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Edit Project') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    //echo $this->Form->control('user_id');
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    //echo $this->Form->control('status');
                    echo $this->Form->control('users._ids', [
                        'type' => 'select',
                        'multiple' => 'checkbox',
                        'options' => $users,
                        'class' => 'custom-checkbox-group'
                    ]);
                    echo $this->Form->control('tasks._ids', [
                        'type' => 'select',
                        'multiple' => 'checkbox',
                        'options' => $tasks,
                        'class' => 'custom-checkbox-group'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['style'=>'background-color:blue;']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
