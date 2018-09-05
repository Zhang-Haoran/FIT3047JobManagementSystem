<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->job_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->job_id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->job_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobs view large-9 medium-8 columns content">
    <h3><?= h($job->job_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Job Name') ?></th>
            <td><?= h($job->job_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Status') ?></th>
            <td><?= h($job->job_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site') ?></th>
            <td><?= $job->has('site') ? $this->Html->link($job->site->site_id, ['controller' => 'Sites', 'action' => 'view', $job->site->site_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Type') ?></th>
            <td><?= $job->has('event_type') ? $this->Html->link($job->event_type->event_type_id, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->event_type_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $job->has('customer') ? $this->Html->link($job->customer->customer_id, ['controller' => 'Customers', 'action' => 'view', $job->customer->customer_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $job->has('employee') ? $this->Html->link($job->employee->employee_id, ['controller' => 'Employees', 'action' => 'view', $job->employee->employee_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Id') ?></th>
            <td><?= $this->Number->format($job->job_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($job->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposit') ?></th>
            <td><?= $this->Number->format($job->deposit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Date') ?></th>
            <td><?= h($job->job_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booked Date') ?></th>
            <td><?= h($job->booked_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E Arrival Time') ?></th>
            <td><?= h($job->e_arrival_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E Setup Time') ?></th>
            <td><?= h($job->e_setup_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E Pickup Time') ?></th>
            <td><?= h($job->e_pickup_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E Pickup Date') ?></th>
            <td><?= h($job->e_pickup_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Order Detail') ?></h4>
        <?= $this->Text->autoParagraph(h($job->order_detail)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional Note') ?></h4>
        <?= $this->Text->autoParagraph(h($job->additional_note)); ?>
    </div>
</div>
