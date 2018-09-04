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
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs index large-9 medium-8 columns content">
    <h3><?= __('Jobs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('job_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('booked_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_arrival_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_setup_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_pickup_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_pickup_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emp_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $this->Number->format($job->job_id) ?></td>
                <td><?= h($job->job_name) ?></td>
                <td><?= h($job->job_status) ?></td>
                <td><?= h($job->job_date) ?></td>
                <td><?= h($job->booked_date) ?></td>
                <td><?= $this->Number->format($job->price) ?></td>
                <td><?= $this->Number->format($job->deposit) ?></td>
                <td><?= h($job->e_arrival_time) ?></td>
                <td><?= h($job->e_setup_time) ?></td>
                <td><?= h($job->e_pickup_time) ?></td>
                <td><?= h($job->e_pickup_date) ?></td>
                <td><?= $job->has('site') ? $this->Html->link($job->site->site_id, ['controller' => 'Sites', 'action' => 'view', $job->site->site_id]) : '' ?></td>
                <td><?= $job->has('event_type') ? $this->Html->link($job->event_type->event_type_id, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->event_type_id]) : '' ?></td>
                <td><?= $job->has('customer') ? $this->Html->link($job->customer->cust_id, ['controller' => 'Customers', 'action' => 'view', $job->customer->cust_id]) : '' ?></td>
                <td><?= $job->has('employee') ? $this->Html->link($job->employee->emp_id, ['controller' => 'Employees', 'action' => 'view', $job->employee->emp_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->job_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->job_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->job_id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->job_id)]) ?>
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
