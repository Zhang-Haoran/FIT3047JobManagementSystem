<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cust Types'), ['controller' => 'CustTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cust Type'), ['controller' => 'CustTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <h3><?= __('Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cust_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cust_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->cust_id) ?></td>
                <td><?= h($customer->cust_name) ?></td>
                <td><?= h($customer->cust_contact) ?></td>
                <td><?= h($customer->cust_phone) ?></td>
                <td><?= h($customer->cust_mobile) ?></td>
                <td><?= h($customer->cust_email) ?></td>
                <td><?= $customer->has('cust_type') ? $this->Html->link($customer->cust_type->cust_type_id, ['controller' => 'CustTypes', 'action' => 'view', $customer->cust_type->cust_type_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->cust_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->cust_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->cust_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->cust_id)]) ?>
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
