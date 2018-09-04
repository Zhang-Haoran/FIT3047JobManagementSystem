<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->mat_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->mat_id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->mat_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materials view large-9 medium-8 columns content">
    <h3><?= h($material->mat_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mat Name') ?></th>
            <td><?= h($material->mat_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mat Id') ?></th>
            <td><?= $this->Number->format($material->mat_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($material->jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Job Name') ?></th>
                <th scope="col"><?= __('Job Status') ?></th>
                <th scope="col"><?= __('Job Date') ?></th>
                <th scope="col"><?= __('Booked Date') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Deposit') ?></th>
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
            <?php foreach ($material->jobs as $jobs): ?>
            <tr>
                <td><?= h($jobs->job_id) ?></td>
                <td><?= h($jobs->job_name) ?></td>
                <td><?= h($jobs->job_status) ?></td>
                <td><?= h($jobs->job_date) ?></td>
                <td><?= h($jobs->booked_date) ?></td>
                <td><?= h($jobs->price) ?></td>
                <td><?= h($jobs->deposit) ?></td>
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
