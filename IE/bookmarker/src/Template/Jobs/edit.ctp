<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $job->job_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->job_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs form large-9 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Edit Job') ?></legend>
        <?php
            echo $this->Form->control('job_name');
            echo $this->Form->control('job_status');
            echo $this->Form->control('job_date');
            echo $this->Form->control('booked_date');
            echo $this->Form->control('price');
            echo $this->Form->control('deposit');
            echo $this->Form->control('order_detail');
            echo $this->Form->control('e_arrival_time', ['empty' => true]);
            echo $this->Form->control('e_setup_time', ['empty' => true]);
            echo $this->Form->control('e_pickup_time', ['empty' => true]);
            echo $this->Form->control('e_pickup_date', ['empty' => true]);
            echo $this->Form->control('additional_note');
            echo $this->Form->control('site_id', ['options' => $sites]);
            echo $this->Form->control('event_type_id', ['options' => $eventTypes]);
            echo $this->Form->control('cust_id', ['options' => $customers]);
            echo $this->Form->control('emp_id', ['options' => $employees]);
            echo $this->Form->control('materials._ids', ['options' => $materials]);
            echo $this->Form->control('stocks._ids', ['options' => $stocks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
