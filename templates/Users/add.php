<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                <button class="return" style="background-color:blue; border-radius:50%; padding:25px;"><p style="font-size: 15px; margin-top:-18px"><-</p></button>
            </a>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('role');
                    //echo $this->Form->control('projects._ids', ['options' => $projects]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['style'=>'background-color:blue;']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
