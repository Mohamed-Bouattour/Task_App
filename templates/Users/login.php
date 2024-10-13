<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email and password') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login'), ['style' => 'background-color: blue; color: #fff; border-color: blue;']); ?>
    <?= $this->Form->end() ?>
</div>