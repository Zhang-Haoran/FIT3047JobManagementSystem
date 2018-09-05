<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeesFunc $employeesFunc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employees Func'), ['action' => 'edit', $employeesFunc->func_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employees Func'), ['action' => 'delete', $employeesFunc->func_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeesFunc->func_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees Funcs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employees Func'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcs'), ['controller' => 'Funcs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Func'), ['controller' => 'Funcs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeesFuncs view large-9 medium-8 columns content">
    <h3><?= h($employeesFunc->func_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Func') ?></th>
            <td><?= $employeesFunc->has('func') ? $this->Html->link($employeesFunc->func->func_id, ['controller' => 'Funcs', 'action' => 'view', $employeesFunc->func->func_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $employeesFunc->has('employee') ? $this->Html->link($employeesFunc->employee->employee_id, ['controller' => 'Employees', 'action' => 'view', $employeesFunc->employee->employee_id]) : '' ?></td>
        </tr>
    </table>
</div>
