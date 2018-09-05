<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->material_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->material_id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->material_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materials view large-9 medium-8 columns content">
    <h3><?= h($material->material_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mat Name') ?></th>
            <td><?= h($material->mat_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Material Id') ?></th>
            <td><?= $this->Number->format($material->material_id) ?></td>
        </tr>
    </table>
</div>
