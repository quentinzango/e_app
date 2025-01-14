<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Connection') ?></legend>
        <?= $this->Form->control('email', ['label' => 'Email']) ?>
        <?= $this->Form->control('password', ['label' => 'Password', 'type' => 'password']) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link("Ajouter un utilisateur", ['action' => 'add']) ?>
</div>
s