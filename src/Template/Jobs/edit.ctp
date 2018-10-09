<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>

    <?= $this->Form->create($job) ?>

        <legend><?= __('Edit Job') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('job_status', array('type'=>'select','options'=>$statusOptions));
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
            echo $this->Form->hidden('employee_id', ['options' => $employees]);
            echo $this->Form->hidden('edited_by');
            echo $this->Form->hidden('last_changed', ['empty' => true]);
            echo $this->Form->control('job_order');

?>


<form action="/JobsController.php" method="get">
    <input type="checkbox" name="sent" value="Invoice"> <br>             <?= $this->Form->control('Invoices')?>
    <div class="form-group"><?= $this->Form->control('Invoice date',['class'=>'form-control','type' => 'date','empty' => true])?></div>
    <input type="checkbox" name="sent" value="order"> <br>                 <?= $this->Form->control('order')?>
    <div class="form-group"><?= $this->Form->control('order date',['class'=>'form-control','type' => 'date','empty' => true])?></div>
    <input type="checkbox" name="sent" value="quote"> <br>               <?= $this->Form->control('quote')?>
    <div class="form-group"><?= $this->Form->control('quote date',['class'=>'form-control','type' => 'date','empty' => true])?></div>

</form>






<?php
            echo $this->Form->hidden('token');
            echo $this->Form->hidden('timeout');
            echo $this->Form->hidden('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
