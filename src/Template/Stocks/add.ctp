<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>

<div class="stocks form large-9 medium-8 columns content">
    <?= $this->Form->create($stock) ?>
    <fieldset>
        <legend><?= __('Add Stock') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('rent_value');
            echo $this->Form->control('min_accs');
            echo $this->Form->control('accessorie_id', ['options' => $accessories, 'empty' => true]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
