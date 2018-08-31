<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stock'), ['action' => 'edit', $stock->stock_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stock'), ['action' => 'delete', $stock->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->stock_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stocks view large-9 medium-8 columns content">
    <h3><?= h($stock->stock_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stock Name') ?></th>
            <td><?= h($stock->stock_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Material') ?></th>
            <td><?= $stock->has('material') ? $this->Html->link($stock->material->mat_id, ['controller' => 'Materials', 'action' => 'view', $stock->material->mat_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Id') ?></th>
            <td><?= $this->Number->format($stock->stock_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Value') ?></th>
            <td><?= $this->Number->format($stock->rent_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Min Material') ?></th>
            <td><?= $this->Number->format($stock->min_material) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($stock->jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Job Name') ?></th>
                <th scope="col"><?= __('Job Status') ?></th>
                <th scope="col"><?= __('Job Date') ?></th>
                <th scope="col"><?= __('Booked Date') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Deposite') ?></th>
                <th scope="col"><?= __('Order Detail') ?></th>
                <th scope="col"><?= __('E Arrival Time') ?></th>
                <th scope="col"><?= __('E Setup Time') ?></th>
                <th scope="col"><?= __('E Pickup Time') ?></th>
                <th scope="col"><?= __('E Pickup Date') ?></th>
                <th scope="col"><?= __('Additional Note') ?></th>
                <th scope="col"><?= __('Site Id') ?></th>
                <th scope="col"><?= __('Event Type Id') ?></th>
                <th scope="col"><?= __('Cust Id') ?></th>
                <th scope="col"><?= __('Emp Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($stock->jobs as $jobs): ?>
            <tr>
                <td><?= h($jobs->job_id) ?></td>
                <td><?= h($jobs->job_name) ?></td>
                <td><?= h($jobs->job_status) ?></td>
                <td><?= h($jobs->job_date) ?></td>
                <td><?= h($jobs->booked_date) ?></td>
                <td><?= h($jobs->price) ?></td>
                <td><?= h($jobs->deposite) ?></td>
                <td><?= h($jobs->order_detail) ?></td>
                <td><?= h($jobs->e_arrival_time) ?></td>
                <td><?= h($jobs->e_setup_time) ?></td>
                <td><?= h($jobs->e_pickup_time) ?></td>
                <td><?= h($jobs->e_pickup_date) ?></td>
                <td><?= h($jobs->additional_note) ?></td>
                <td><?= h($jobs->site_id) ?></td>
                <td><?= h($jobs->event_type_id) ?></td>
                <td><?= h($jobs->cust_id) ?></td>
                <td><?= h($jobs->emp_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->job_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->job_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->job_id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->job_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
