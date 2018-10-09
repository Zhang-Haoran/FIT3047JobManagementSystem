<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventType $eventType
 */
?>

<div class="eventTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($eventType) ?>
    <fieldset>
        <legend><?= __('Add Event Type') ?></legend>
        <?php
            echo $this->Form->control('name');

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
