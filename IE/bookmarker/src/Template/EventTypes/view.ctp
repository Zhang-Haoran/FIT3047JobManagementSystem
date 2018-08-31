<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventType $eventType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Type'), ['action' => 'edit', $eventType->event_type_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Type'), ['action' => 'delete', $eventType->event_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventType->event_type_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventTypes view large-9 medium-8 columns content">
    <h3><?= h($eventType->event_type_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event Type') ?></th>
            <td><?= h($eventType->event_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Type Id') ?></th>
            <td><?= $this->Number->format($eventType->event_type_id) ?></td>
        </tr>
    </table>
</div>
