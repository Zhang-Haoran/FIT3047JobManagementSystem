<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StockLine $stockLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stockLine->stock_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stockLine->stock_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stock Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stockLines form large-9 medium-8 columns content">
    <?= $this->Form->create($stockLine) ?>
    <fieldset>
        <legend><?= __('Edit Stock Line') ?></legend>
        <?php
            echo $this->Form->control('stock_num');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
