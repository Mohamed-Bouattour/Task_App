<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $tasks
 */
?>


<div class="row">
<?= $this->Html->css('view.css') ?>
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
                <legend><?= __('Add Project') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    //echo $this->Form->control('user_id');
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    //echo $this->Form->control('status');
                    echo $this->Form->control('users._ids', [
                        'type' => 'select',
                        'multiple' => 'checkbox', // Utilisez 'checkbox' pour plusieurs options
                        'options' => $users,
                        'class' => 'custom-checkbox-group'
                    ]);
                    echo $this->Form->control('tasks._ids', [
                        'type' => 'select',
                        'multiple' => 'checkbox', // Utilisez 'checkbox' pour plusieurs options
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
<style>

.custom-checkbox-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 350px;
        margin-bottom: 25px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .custom-checkbox-group:hover {
        
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Style pour chaque étiquette (label) des cases à cocher */
    .custom-checkbox-group label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        color: #4a4a4a;
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.2s, transform 0.2s;
        cursor: pointer;
    }


    /* Style pour les cases à cocher elles-mêmes */
    .custom-checkbox-group input[type="checkbox"] {
        width: 24px;
        height: 24px;
        border: 2px solid #007bff;
        border-radius: 4px;
        cursor: pointer;
        accent-color: #007bff;
    }

    .custom-checkbox-group input[type="checkbox"]:hover {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }


</style>