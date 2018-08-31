<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcs'), ['controller' => 'Funcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Func'), ['controller' => 'Funcs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employees index large-9 medium-8 columns content">
    <h3><?= __('Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('emp_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emp_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emp_username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emp_password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emp_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emp_email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $this->Number->format($employee->emp_id) ?></td>
                <td><?= h($employee->emp_name) ?></td>
                <td><?= h($employee->emp_username) ?></td>
                <td><?= h($employee->emp_password) ?></td>
                <td><?= h($employee->emp_phone) ?></td>
                <td><?= h($employee->emp_email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->emp_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->emp_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->emp_id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->emp_id)]) ?>
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
