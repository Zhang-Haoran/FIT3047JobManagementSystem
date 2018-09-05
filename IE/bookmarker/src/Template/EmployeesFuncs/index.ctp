<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeesFunc[]|\Cake\Collection\CollectionInterface $employeesFuncs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employees Func'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcs'), ['controller' => 'Funcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Func'), ['controller' => 'Funcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employeesFuncs index large-9 medium-8 columns content">
    <h3><?= __('Employees Funcs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('func_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employeesFuncs as $employeesFunc): ?>
            <tr>
                <td><?= $employeesFunc->has('func') ? $this->Html->link($employeesFunc->func->func_id, ['controller' => 'Funcs', 'action' => 'view', $employeesFunc->func->func_id]) : '' ?></td>
                <td><?= $employeesFunc->has('employee') ? $this->Html->link($employeesFunc->employee->employee_id, ['controller' => 'Employees', 'action' => 'view', $employeesFunc->employee->employee_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employeesFunc->func_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employeesFunc->func_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employeesFunc->func_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeesFunc->func_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
