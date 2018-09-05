<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Func $func
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Func'), ['action' => 'edit', $func->func_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Func'), ['action' => 'delete', $func->func_id], ['confirm' => __('Are you sure you want to delete # {0}?', $func->func_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Funcs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Func'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funcs view large-9 medium-8 columns content">
    <h3><?= h($func->func_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Func Name') ?></th>
            <td><?= h($func->func_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Func Id') ?></th>
            <td><?= $this->Number->format($func->func_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employees') ?></h4>
        <?php if (!empty($func->employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Emp Fname') ?></th>
                <th scope="col"><?= __('Emp Lname') ?></th>
                <th scope="col"><?= __('Emp Username') ?></th>
                <th scope="col"><?= __('Emp Password') ?></th>
                <th scope="col"><?= __('Emp Phone') ?></th>
                <th scope="col"><?= __('Emp Email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($func->employees as $employees): ?>
            <tr>
                <td><?= h($employees->employee_id) ?></td>
                <td><?= h($employees->emp_fname) ?></td>
                <td><?= h($employees->emp_lname) ?></td>
                <td><?= h($employees->emp_username) ?></td>
                <td><?= h($employees->emp_password) ?></td>
                <td><?= h($employees->emp_phone) ?></td>
                <td><?= h($employees->emp_email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->employee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->employee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->employee_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
