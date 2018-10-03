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

                        <div class="form-group"><?= $this->Form->control('name',['class'=>'form-control'])?></div>
                        <div class="form-group"><?= $this->Form->control('status',['class'=>'form-control'])?></div>
                        <div class="form-group"><?= $this->Form->control('job_date',['class'=>'form-control'])?></div>
                        <div class="form-group"><?= $this->Form->control('price',['class'=>'form-control'])?></div>
                        <div class="form-group"><?= $this->Form->control('deposit',['class'=>'form-control'])?></div>
                        <div class="form-group"><?= $this->Form->control('order_detail',['class'=>'form-control'])?></div>
                        <div class="form-group"><?= $this->Form->control('e_arrival_time',['class'=>'form-control','empty' => true])?></div>


                        <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
                        <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                            <input class="form-control" size="16" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" /><br/>


                        <div class="form-group"><?= $this->Form->control('e_setup_time',['class'=>'form-control','empty' => true])?></div>
                        <div class="form-group"><?= $this->Form->control('e_pickup_time',['class'=>'form-control','empty' => true])?></div>
                        <div class="form-group"><?= $this->Form->control('additional_note',['class'=>'form-control'])?></div>
            <?= $this->Form->control('site_id', ['options' => $sites])?>
            <?= $this->Form->control('event_type_id', ['options' => $eventTypes])?>
            <?= $this->Form->control('customer_id', ['options' => $customers])?>
            <?= $this->Form->control('employee_id', ['options' => $employees])?>
            <?= $this->Form->control('edited_by')?>
            <?= $this->Form->control('last_changed', ['empty' => true])?>

                        <form action="/JobsController.php" method="get">
                            <input type="checkbox" name="sent" value="Invoice"> <br>             <?= $this->Form->control('Invoices')?>
                            <div class="form-group"><?= $this->Form->control('Invoice date',['class'=>'form-control','type' => 'date','empty' => true])?></div>
                            <input type="checkbox" name="sent" value="order"> <br>                 <?= $this->Form->control('order')?>
                            <div class="form-group"><?= $this->Form->control('order date',['class'=>'form-control','type' => 'date','empty' => true])?></div>
                            <input type="checkbox" name="sent" value="quote"> <br>               <?= $this->Form->control('quote')?>
                            <div class="form-group"><?= $this->Form->control('quote date',['class'=>'form-control','type' => 'date','empty' => true])?></div>

                        </form>




            <?= $this->Form->hidden('token')?>
            <?= $this->Form->hidden('timeout')?>
            <?= $this->Form->hidden('is_deleted')?>

    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-default']) ?>
    <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>
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
        <div class="form-group"><?= $this->Form->control('employee_id', ['options' => $employees, 'class' => 'form-control']) ?></div>
        <div class="form-group"><?= $this->Form->control('edited_by', ['class' => 'form-control']) ?></div>
        <div class="form-group"><?= $this->Form->control('last_changed', ['empty' => true]) ?></div>
        <div class="form-group"><?= $this->Form->control('Invoice', ['class' => 'form-control']) ?></div>
        <div class="form-group"><?= $this->Form->control('job_order', ['class' => 'form-control']) ?></div>
        <div class="form-group"><?= $this->Form->control('quote', ['class' => 'form-control']) ?></div>

        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-outline btn-primary btn-lg btn-block']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>




