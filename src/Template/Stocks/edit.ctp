<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>

<div class="stocks form large-9 medium-8 columns content">
    <?= $this->Form->create($stock) ?>
    <fieldset>
        <legend><?= __('Edit Stock') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('rent_value');
            echo $this->Form->control('min_accs');
            echo $this->Form->control('accessorie_id', ['options' => $accessories, 'empty' => true]);
            //echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
