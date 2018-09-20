<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessorieLine $accessorieLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accessorieLine->accessorie_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accessorieLine->accessorie_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Accessorie Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accessories'), ['controller' => 'Accessories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accessory'), ['controller' => 'Accessories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accessorieLines form large-9 medium-8 columns content">
    <?= $this->Form->create($accessorieLine) ?>
    <fieldset>
        <legend><?= __('Edit Accessorie Line') ?></legend>
        <?php
            echo $this->Form->control('accs_in');
            echo $this->Form->control('accs_out');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
