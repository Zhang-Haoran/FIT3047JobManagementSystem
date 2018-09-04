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
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?> </li>
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
            <td><?= $job->has('customer') ? $this->Html->link($job->customer->cust_id, ['controller' => 'Customers', 'action' => 'view', $job->customer->cust_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $job->has('employee') ? $this->Html->link($job->employee->emp_id, ['controller' => 'Employees', 'action' => 'view', $job->employee->emp_id]) : '' ?></td>
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
    <div class="related">
        <h4><?= __('Related Materials') ?></h4>
        <?php if (!empty($job->materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Mat Id') ?></th>
                <th scope="col"><?= __('Mat Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($job->materials as $materials): ?>
            <tr>
                <td><?= h($materials->mat_id) ?></td>
                <td><?= h($materials->mat_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Materials', 'action' => 'view', $materials->mat_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Materials', 'action' => 'edit', $materials->mat_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materials', 'action' => 'delete', $materials->mat_id], ['confirm' => __('Are you sure you want to delete # {0}?', $materials->mat_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stocks') ?></h4>
        <?php if (!empty($job->stocks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Stock Id') ?></th>
                <th scope="col"><?= __('Stock Name') ?></th>
                <th scope="col"><?= __('Rent Value') ?></th>
                <th scope="col"><?= __('Min Material') ?></th>
                <th scope="col"><?= __('Mat Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($job->stocks as $stocks): ?>
            <tr>
                <td><?= h($stocks->stock_id) ?></td>
                <td><?= h($stocks->stock_name) ?></td>
                <td><?= h($stocks->rent_value) ?></td>
                <td><?= h($stocks->min_material) ?></td>
                <td><?= h($stocks->mat_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stocks', 'action' => 'view', $stocks->stock_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stocks', 'action' => 'edit', $stocks->stock_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stocks', 'action' => 'delete', $stocks->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stocks->stock_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
