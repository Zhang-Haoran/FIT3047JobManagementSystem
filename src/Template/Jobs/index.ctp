<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accessorie Lines'), ['controller' => 'AccessorieLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accessorie Line'), ['controller' => 'AccessorieLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock Lines'), ['controller' => 'StockLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Line'), ['controller' => 'StockLines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs index large-9 medium-8 columns content">
    <h3><?= __('Jobs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('booked_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_arrival_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_setup_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_pickup_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_changed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Invoice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quote') ?></th>
                <th scope="col"><?= $this->Paginator->sort('token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timeout') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $this->Number->format($job->id) ?></td>
                <td><?= h($job->name) ?></td>
                <td><?= h($job->status) ?></td>
                <td><?= h($job->job_date) ?></td>
                <td><?= h($job->booked_date) ?></td>
                <td><?= $this->Number->format($job->price) ?></td>
                <td><?= $this->Number->format($job->deposit) ?></td>
                <td><?= h($job->e_arrival_time) ?></td>
                <td><?= h($job->e_setup_time) ?></td>
                <td><?= h($job->e_pickup_time) ?></td>
                <td><?= $job->has('site') ? $this->Html->link($job->site->name, ['controller' => 'Sites', 'action' => 'view', $job->site->id]) : '' ?></td>
                <td><?= $job->has('event_type') ? $this->Html->link($job->event_type->name, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->id]) : '' ?></td>
                <td><?= $job->has('customer') ? $this->Html->link($job->customer->id, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
                <td><?= $job->has('employee') ? $this->Html->link($job->employee->id, ['controller' => 'Employees', 'action' => 'view', $job->employee->id]) : '' ?></td>
                <td><?= h($job->edited_by) ?></td>
                <td><?= h($job->last_changed) ?></td>
                <td><?= h($job->Invoice) ?></td>
                <td><?= h($job->order) ?></td>
                <td><?= h($job->quote) ?></td>
                <td><?= h($job->token) ?></td>
                <td><?= h($job->timeout) ?></td>
                <td><?= h($job->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
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
