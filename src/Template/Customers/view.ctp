<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<div class="customers view columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First name') ?></th>
            <td><?= h($customer->fname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last name') ?></th>
            <td><?= h($customer->lname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact name') ?></th>
            <td><?= h($customer->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone number') ?></th>
            <td><?= h($customer->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile number') ?></th>
            <td><?= h($customer->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email address') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $customer->has('cust_type') ? $this->Html->link($customer->cust_type->name, ['controller' => 'CustTypes', 'action' => 'view', $customer->cust_type->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($customer->jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Job Date') ?></th>
                <th scope="col"><?= __('Booked Date') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Deposit') ?></th>
                <th scope="col"><?= __('Order Detail') ?></th>
                <th scope="col"><?= __('E Arrival Time') ?></th>
                <th scope="col"><?= __('E Setup Time') ?></th>
                <th scope="col"><?= __('E Pickup Time') ?></th>
                <th scope="col"><?= __('Additional Note') ?></th>
                <th scope="col"><?= __('Site Id') ?></th>
                <th scope="col"><?= __('Event Type Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Last Changed') ?></th>
                <th scope="col"><?= __('Invoice') ?></th>
                <th scope="col"><?= __('Order') ?></th>
                <th scope="col"><?= __('Quote') ?></th>
                <th scope="col"><?= __('Token') ?></th>
                <th scope="col"><?= __('Timeout') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->jobs as $jobs): ?>
            <tr>
                <td><?= h($jobs->id) ?></td>
                <td><?= h($jobs->name) ?></td>
                <td><?= h($jobs->status) ?></td>
                <td><?= h($jobs->job_date) ?></td>
                <td><?= h($jobs->booked_date) ?></td>
                <td><?= h($jobs->price) ?></td>
                <td><?= h($jobs->deposit) ?></td>
                <td><?= h($jobs->order_detail) ?></td>
                <td><?= h($jobs->e_arrival_time) ?></td>
                <td><?= h($jobs->e_setup_time) ?></td>
                <td><?= h($jobs->e_pickup_time) ?></td>
                <td><?= h($jobs->additional_note) ?></td>
                <td><?= h($jobs->site_id) ?></td>
                <td><?= h($jobs->event_type_id) ?></td>
                <td><?= h($jobs->customer_id) ?></td>
                <td><?= h($jobs->employee_id) ?></td>
                <td><?= h($jobs->edited_by) ?></td>
                <td><?= h($jobs->last_changed) ?></td>
                <td><?= h($jobs->Invoice) ?></td>
                <td><?= h($jobs->order) ?></td>
                <td><?= h($jobs->quote) ?></td>
                <td><?= h($jobs->token) ?></td>
                <td><?= h($jobs->timeout) ?></td>
                <td><?= h($jobs->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
