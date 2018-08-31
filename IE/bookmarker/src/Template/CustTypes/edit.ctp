<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType $custType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $custType->cust_type_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $custType->cust_type_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cust Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="custTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($custType) ?>
    <fieldset>
        <legend><?= __('Edit Cust Type') ?></legend>
        <?php
            echo $this->Form->control('cust_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
