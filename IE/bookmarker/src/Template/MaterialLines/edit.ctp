<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialLine $materialLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $materialLine->material_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materialLine->material_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Material Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialLines form large-9 medium-8 columns content">
    <?= $this->Form->create($materialLine) ?>
    <fieldset>
        <legend><?= __('Edit Material Line') ?></legend>
        <?php
            echo $this->Form->control('mat_in');
            echo $this->Form->control('mat_out');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
