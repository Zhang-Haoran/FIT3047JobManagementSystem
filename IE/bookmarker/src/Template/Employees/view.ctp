<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->employee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->employee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcs'), ['controller' => 'Funcs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Func'), ['controller' => 'Funcs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->employee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Emp Fname') ?></th>
            <td><?= h($employee->emp_fname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emp Lname') ?></th>
            <td><?= h($employee->emp_lname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emp Username') ?></th>
            <td><?= h($employee->emp_username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emp Password') ?></th>
            <td><?= h($employee->emp_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emp Phone') ?></th>
            <td><?= h($employee->emp_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emp Email') ?></th>
            <td><?= h($employee->emp_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee Id') ?></th>
            <td><?= $this->Number->format($employee->employee_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Funcs') ?></h4>
        <?php if (!empty($employee->funcs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Func Id') ?></th>
                <th scope="col"><?= __('Func Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->funcs as $funcs): ?>
            <tr>
                <td><?= h($funcs->func_id) ?></td>
                <td><?= h($funcs->func_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Funcs', 'action' => 'view', $funcs->func_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Funcs', 'action' => 'edit', $funcs->func_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Funcs', 'action' => 'delete', $funcs->func_id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcs->func_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
