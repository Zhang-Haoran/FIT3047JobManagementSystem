<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcs'), ['controller' => 'Funcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Func'), ['controller' => 'Funcs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->control('emp_name');
            echo $this->Form->control('emp_username');
            echo $this->Form->control('emp_password');
            echo $this->Form->control('emp_phone');
            echo $this->Form->control('emp_email');
            echo $this->Form->control('funcs._ids', ['options' => $funcs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
