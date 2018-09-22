<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="jobs form columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add Job') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('status');
            echo $this->Form->control('job_date');
            echo $this->Form->control('booked_date');
            echo $this->Form->control('price');
            echo $this->Form->control('deposit');
            echo $this->Form->control('order_detail');
            echo $this->Form->control('e_arrival_time', ['empty' => true]);
            echo $this->Form->control('e_setup_time', ['empty' => true]);
            echo $this->Form->control('e_pickup_time', ['empty' => true]);
            echo $this->Form->control('additional_note');
            echo $this->Form->control('site_id', ['options' => $sites]);
            echo $this->Form->control('event_type_id', ['options' => $eventTypes]);
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('employee_id', ['options' => $employees]);
            echo $this->Form->control('edited_by');
            echo $this->Form->control('last_changed', ['empty' => true]);
            echo $this->Form->control('Invoice');
            echo $this->Form->control('order');
            echo $this->Form->control('quote');
            echo $this->Form->hidden('token');
            echo $this->Form->hidden('timeout');
            echo $this->Form->hidden('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
