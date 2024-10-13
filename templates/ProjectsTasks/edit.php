<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectsTask $projectsTask
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 * @var string[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectsTask->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectsTask->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Projects Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectsTasks form content">
            <?= $this->Form->create($projectsTask) ?>
            <fieldset>
                <legend><?= __('Edit Projects Task') ?></legend>
                <?php
                    echo $this->Form->control('project_id', ['options' => $projects]);
                    echo $this->Form->control('task_id', ['options' => $tasks]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
