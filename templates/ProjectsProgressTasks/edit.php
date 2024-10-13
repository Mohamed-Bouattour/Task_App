<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectsProgressTask $projectsProgressTask
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 * @var string[]|\Cake\Collection\CollectionInterface $tasks
 * @var string[]|\Cake\Collection\CollectionInterface $progress
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectsProgressTask->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectsProgressTask->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Projects Progress Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectsProgressTasks form content">
            <?= $this->Form->create($projectsProgressTask) ?>
            <fieldset>
                <legend><?= __('Edit Projects Progress Task') ?></legend>
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
