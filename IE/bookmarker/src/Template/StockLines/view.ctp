<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StockLine $stockLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stock Line'), ['action' => 'edit', $stockLine->stock_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stock Line'), ['action' => 'delete', $stockLine->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockLine->stock_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stock Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stockLines view large-9 medium-8 columns content">
    <h3><?= h($stockLine->stock_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $stockLine->has('stock') ? $this->Html->link($stockLine->stock->stock_id, ['controller' => 'Stocks', 'action' => 'view', $stockLine->stock->stock_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $stockLine->has('job') ? $this->Html->link($stockLine->job->job_id, ['controller' => 'Jobs', 'action' => 'view', $stockLine->job->job_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Num') ?></th>
            <td><?= $this->Number->format($stockLine->stock_num) ?></td>
        </tr>
    </table>
</div>
