<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accessorie Lines'), ['controller' => 'AccessorieLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accessorie Line'), ['controller' => 'AccessorieLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock Lines'), ['controller' => 'StockLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Line'), ['controller' => 'StockLines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs form large-9 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add Job') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('status');
            echo $this->Form->control('job_date');
            echo $this->Form->control('booked_date');
            echo $this->Form->control('price');
            echo $this->Form->control('deposit');
            echo $this->Form->control('order_detail');
            echo $this->Form->control('e_arrival_time', ['empty' => true]);
            echo $this->Form->control('e_setup_time', ['empty' => true]);
            echo $this->Form->control('e_pickup_time', ['empty' => true]);
            echo $this->Form->control('additional_note');
            echo $this->Form->control('site_id', ['options' => $sites]);
            echo $this->Form->control('event_type_id', ['options' => $eventTypes]);
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('employee_id', ['options' => $employees]);
            echo $this->Form->control('edited_by');
            echo $this->Form->control('last_changed', ['empty' => true]);
            echo $this->Form->control('Invoice');
            echo $this->Form->control('order');
            echo $this->Form->control('quote');
            echo $this->Form->control('token');
            echo $this->Form->control('timeout');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
