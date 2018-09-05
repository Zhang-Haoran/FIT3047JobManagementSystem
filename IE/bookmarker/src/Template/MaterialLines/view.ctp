<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialLine $materialLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material Line'), ['action' => 'edit', $materialLine->material_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material Line'), ['action' => 'delete', $materialLine->material_id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialLine->material_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Material Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materialLines view large-9 medium-8 columns content">
    <h3><?= h($materialLine->material_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Material') ?></th>
            <td><?= $materialLine->has('material') ? $this->Html->link($materialLine->material->material_id, ['controller' => 'Materials', 'action' => 'view', $materialLine->material->material_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $materialLine->has('job') ? $this->Html->link($materialLine->job->job_id, ['controller' => 'Jobs', 'action' => 'view', $materialLine->job->job_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mat In') ?></th>
            <td><?= $this->Number->format($materialLine->mat_in) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mat Out') ?></th>
            <td><?= $this->Number->format($materialLine->mat_out) ?></td>
        </tr>
    </table>
</div>
