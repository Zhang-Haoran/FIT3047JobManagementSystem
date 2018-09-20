<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accessory $accessory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accessory'), ['action' => 'edit', $accessory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accessory'), ['action' => 'delete', $accessory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accessories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accessory'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accessories view large-9 medium-8 columns content">
    <h3><?= h($accessory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($accessory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accessory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $accessory->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
