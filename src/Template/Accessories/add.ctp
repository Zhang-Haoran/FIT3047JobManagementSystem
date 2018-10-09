<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accessory $accessory
 */
?>

<div class="accessories form large-9 medium-8 columns content">
    <?= $this->Form->create($accessory) ?>
    <fieldset>
        <legend><?= __('Add Accessory') ?></legend>
        <?php
            echo $this->Form->control('name');

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
