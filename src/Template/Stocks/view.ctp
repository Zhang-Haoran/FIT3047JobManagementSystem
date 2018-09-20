<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stock'), ['action' => 'edit', $stock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stock'), ['action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accessories'), ['controller' => 'Accessories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accessory'), ['controller' => 'Accessories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Lines'), ['controller' => 'StockLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Line'), ['controller' => 'StockLines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stocks view large-9 medium-8 columns content">
    <h3><?= h($stock->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($stock->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accessory') ?></th>
            <td><?= $stock->has('accessory') ? $this->Html->link($stock->accessory->name, ['controller' => 'Accessories', 'action' => 'view', $stock->accessory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Value') ?></th>
            <td><?= $this->Number->format($stock->rent_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Min Accs') ?></th>
            <td><?= $this->Number->format($stock->min_accs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $stock->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Stock Lines') ?></h4>
        <?php if (!empty($stock->stock_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Stock Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Stock Num') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($stock->stock_lines as $stockLines): ?>
            <tr>
                <td><?= h($stockLines->stock_id) ?></td>
                <td><?= h($stockLines->job_id) ?></td>
                <td><?= h($stockLines->stock_num) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StockLines', 'action' => 'view', $stockLines->stock_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StockLines', 'action' => 'edit', $stockLines->stock_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StockLines', 'action' => 'delete', $stockLines->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockLines->stock_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
