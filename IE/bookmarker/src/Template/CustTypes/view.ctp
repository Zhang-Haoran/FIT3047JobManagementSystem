<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType $custType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cust Type'), ['action' => 'edit', $custType->cust_type_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cust Type'), ['action' => 'delete', $custType->cust_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $custType->cust_type_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cust Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cust Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="custTypes view large-9 medium-8 columns content">
    <h3><?= h($custType->cust_type_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cust Type') ?></th>
            <td><?= h($custType->cust_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cust Type Id') ?></th>
            <td><?= $this->Number->format($custType->cust_type_id) ?></td>
        </tr>
    </table>
</div>
