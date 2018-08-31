<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Func $func
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Funcs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcs form large-9 medium-8 columns content">
    <?= $this->Form->create($func) ?>
    <fieldset>
        <legend><?= __('Add Func') ?></legend>
        <?php
            echo $this->Form->control('func_name');
            echo $this->Form->control('employees._ids', ['options' => $employees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
