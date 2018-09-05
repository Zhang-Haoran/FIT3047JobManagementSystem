<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->customer_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->customer_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cust Types'), ['controller' => 'CustTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cust Type'), ['controller' => 'CustTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->customer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cust Fname') ?></th>
            <td><?= h($customer->cust_fname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Lname') ?></th>
            <td><?= h($customer->cust_lname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Contact') ?></th>
            <td><?= h($customer->cust_contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Phone') ?></th>
            <td><?= h($customer->cust_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Mobile') ?></th>
            <td><?= h($customer->cust_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Email') ?></th>
            <td><?= h($customer->cust_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Type') ?></th>
            <td><?= $customer->has('cust_type') ? $this->Html->link($customer->cust_type->cust_type_id, ['controller' => 'CustTypes', 'action' => 'view', $customer->cust_type->cust_type_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Id') ?></th>
            <td><?= $this->Number->format($customer->customer_id) ?></td>
        </tr>
    </table>
</div>
