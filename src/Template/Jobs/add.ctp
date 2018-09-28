<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Job') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<?= $this->Form->create($job) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('job_status', array('type' => 'select', 'options' => $statusOptions), ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('job_date', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('price', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('deposit', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('order_detail', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('e_arrival_time', ['class' => 'form-control', 'empty' => true]) ?></div>
                        <div class="form-group"><?= $this->Form->control('e_setup_time', ['class' => 'form-control', 'empty' => true]) ?></div>
                        <div class="form-group"><?= $this->Form->control('e_pickup_time', ['class' => 'form-control', 'empty' => true]) ?></div>
                        <div class="form-group"><?= $this->Form->control('additional_note', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('site_id', ['options' => $sites, 'class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('event_type_id', ['options' => $eventTypes, 'class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('customer_id', ['options' => $customers, 'class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->hidden('employee_id', ['options' => $employees, 'class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->hidden('edited_by', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->hidden('last_changed', ['empty' => true]) ?></div>
                        <div class="form-group"><?= $this->Form->control('Invoice', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('job_order', ['class' => 'form-control']) ?></div>
                        <div class="form-group"><?= $this->Form->control('quote', ['class' => 'form-control']) ?></div>

                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
