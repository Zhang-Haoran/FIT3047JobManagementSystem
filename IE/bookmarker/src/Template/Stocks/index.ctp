<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stocks index large-9 medium-8 columns content">
    <h3><?= __('Stocks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('stock_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('min_material') ?></th>
                <th scope="col"><?= $this->Paginator->sort('material_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $stock): ?>
            <tr>
                <td><?= $this->Number->format($stock->stock_id) ?></td>
                <td><?= h($stock->stock_name) ?></td>
                <td><?= $this->Number->format($stock->rent_value) ?></td>
                <td><?= $this->Number->format($stock->min_material) ?></td>
                <td><?= $stock->has('material') ? $this->Html->link($stock->material->material_id, ['controller' => 'Materials', 'action' => 'view', $stock->material->material_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stock->stock_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stock->stock_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stock->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->stock_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
