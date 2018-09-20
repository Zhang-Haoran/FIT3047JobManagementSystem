<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessorieLine $accessorieLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accessorie Line'), ['action' => 'edit', $accessorieLine->accessorie_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accessorie Line'), ['action' => 'delete', $accessorieLine->accessorie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessorieLine->accessorie_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accessorie Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accessorie Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accessories'), ['controller' => 'Accessories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accessory'), ['controller' => 'Accessories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accessorieLines view large-9 medium-8 columns content">
    <h3><?= h($accessorieLine->accessorie_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Accessory') ?></th>
            <td><?= $accessorieLine->has('accessory') ? $this->Html->link($accessorieLine->accessory->name, ['controller' => 'Accessories', 'action' => 'view', $accessorieLine->accessory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $accessorieLine->has('job') ? $this->Html->link($accessorieLine->job->name, ['controller' => 'Jobs', 'action' => 'view', $accessorieLine->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accs In') ?></th>
            <td><?= $this->Number->format($accessorieLine->accs_in) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accs Out') ?></th>
            <td><?= $this->Number->format($accessorieLine->accs_out) ?></td>
        </tr>
    </table>
</div>
