<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectsProgressTask $projectsProgressTask
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 * @var \Cake\Collection\CollectionInterface|string[] $tasks
 * @var \Cake\Collection\CollectionInterface|string[] $progress
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Projects Progress Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectsProgressTasks form content">
            <?= $this->Form->create($projectsProgressTask) ?>
            <fieldset>
                <legend><?= __('Add Projects Progress Task') ?></legend>
                <?php
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('task_id', ['options' => $tasks]);
                    echo $this->Form->control('progres_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
