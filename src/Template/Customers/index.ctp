<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>

<div class="customers index content columns">
    <h3><?= __('Customers') ?></h3>
    <table cellpadding="0" cellspacing="0" id="datatables" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Contact name') ?></th>
                <th scope="col"><?= __('Phone number') ?></th>
                <th scope="col"><?= __('Mobile number') ?></th>
                <th scope="col"><?= __('Email address') ?></th>
                <th scope="col"><?= __('Type') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= h($customer->full_name) ?></td>
                <td><?= h($customer->contact) ?></td>
                <td><?= h($customer->phone) ?></td>
                <td><?= h($customer->mobile) ?></td>
                <td><?= h($customer->email) ?></td>
                <td><?= $customer->has('cust_type') ? $this->Html->link($customer->cust_type->name, ['controller' => 'CustTypes', 'action' => 'view', $customer->cust_type->id]) : '' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
