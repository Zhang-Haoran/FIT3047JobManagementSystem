<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType $custType
 */
?>
<div class="custTypes form content">
    <?= $this->Form->create($custType) ?>
    <fieldset>
        <legend><?= __('Edit Customer Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->hidden('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
