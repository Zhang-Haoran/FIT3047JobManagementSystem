<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeesFunc $employeesFunc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employeesFunc->func_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employeesFunc->func_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employees Funcs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcs'), ['controller' => 'Funcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Func'), ['controller' => 'Funcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employeesFuncs form large-9 medium-8 columns content">
    <?= $this->Form->create($employeesFunc) ?>
    <fieldset>
        <legend><?= __('Edit Employees Func') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
