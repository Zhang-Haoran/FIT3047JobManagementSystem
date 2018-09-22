<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<div class="jobs index columns content">
    <h3><?= __('Jobs') ?></h3>
    <table cellpadding="0" cellspacing="0" id="datatables" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col"><?= __('id') ?></th>
                <th scope="col"><?= __('name') ?></th>
                <th scope="col"><?= __('status') ?></th>
                <th scope="col"><?= __('job_date') ?></th>
                <th scope="col"><?= __('booked_date') ?></th>
                <th scope="col"><?= __('price') ?></th>
                <th scope="col"><?= __('deposit') ?></th>
                <th scope="col"><?= __('e_arrival_time') ?></th>
                <th scope="col"><?= __('e_setup_time') ?></th>
                <th scope="col"><?= __('e_pickup_time') ?></th>
                <th scope="col"><?= __('site_id') ?></th>
                <th scope="col"><?= __('event_type_id') ?></th>
                <th scope="col"><?= __('customer_id') ?></th>
                <th scope="col"><?= __('employee_id') ?></th>
                <th scope="col"><?= __('edited_by') ?></th>
                <th scope="col"><?= __('last_changed') ?></th>
                <th scope="col"><?= __('Invoice') ?></th>
                <th scope="col"><?= __('order') ?></th>
                <th scope="col"><?= __('quote') ?></th>
                <th scope="col"><?= __('token') ?></th>
                <th scope="col"><?= __('timeout') ?></th>
                <th scope="col"><?= __('is_deleted') ?></th>
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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
