<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>

<?= $this->html->css('jquery.datetimepicker.min.css')?>
<?= $this->html->script('jquery.js')?>
<?= $this->html->script('jquery.datetimepicker.full.js')?>

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
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#job" data-toggle="tab">Job</a>
                    </li>
                    <li><a href="#customer" data-toggle="tab">Customer</a>
                    </li>
                    <li><a href="#site" data-toggle="tab">Site</a>
                    </li>
                    <li><a href="#priceInfo" data-toggle="tab">Price Info</a>
                    </li>
                    <li><a href="#setupDetail" data-toggle="tab">Setup & Pickup Detail</a>
                    </li>
                    <li><a href="#stock" data-toggle="tab">Stock & Order Detail</a>
                    </li>
                </ul>
                <div class="tab-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tab-pane fade in active" id="job">
                            <div class="form-group"></div>
                            <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control', 'style' => 'margin-bottom:20px']) ?></div>
                            <div class="form-group"><?= $this->Form->control('job_status', array('class' => 'form-control', 'type' => 'select', 'options' => $statusOptions, 'style' => 'margin-bottom:20px')) ?></div>
                            <?php echo $this->Form->input('job_date', array('class' => 'form-control','placeholder'=>'Please select job date','label' => "Job Date",'type' => 'text','empty'=>'true','id' => 'job_datetime', 'style' => 'margin-bottom:20px'));?>
                            <div class="form-group"><?= $this->Form->control('event_type_id', ['options' => $eventTypes, 'class' => 'form-control','style' => 'margin-bottom:20px','id'=> 'type_html_id']) ?></div>
                            <div class="form-group"><?= $this->Form->hidden('employee_id', ['options' => $employees, 'class' => 'form-control']) ?></div>
                            <div class="form-group"><?= $this->Form->hidden('edited_by', ['class' => 'form-control']) ?></div>
                            <div class="form-group"><?= $this->Form->hidden('last_changed', ['empty' => true]) ?></div>
                        </div>
                        <div class="tab-pane fade" id="customer">
                            <div class="form-group"></div>
                            <div class="form-group"><?= $this->Form->control('customer_id', ['options' => $customers, 'class' => 'form-control','id'=> 'cust_html_id']) ?></div>
                        </div>
                        <div class="tab-pane fade" id="site">
                            <div class="form-group"></div>
                            <div class="form-group"><?= $this->Form->control('site_id', ['options' => $sites, 'class' => 'form-control','id'=> 'site_html_id']) ?></div>
                        </div>
                        <div class="tab-pane fade" id="priceInfo">
                            <div class="form-group"></div>
                            <div class="form-group"><?= $this->Form->control('Invoice', ['class' => 'form-control','style' => 'margin-bottom:20px']) ?></div>
                            <div class="form-group"><?= $this->Form->control('job_order', ['class' => 'form-control','style' => 'margin-bottom:20px']) ?></div>
                            <div class="form-group"><?= $this->Form->control('quote', ['class' => 'form-control','style' => 'margin-bottom:20px']) ?></div>
                            <div class="form-group"><?= $this->Form->control('price', ['class' => 'form-control','style' => 'margin-bottom:20px']) ?></div>
                            <div class="form-group"><?= $this->Form->control('deposit', ['class' => 'form-control','style' => 'margin-bottom:20px']) ?></div>
                        </div>
                        <div class="tab-pane fade" id="setupDetail">
                            <div class="form-group"></div>
                            <?php echo $this->Form->input('e_arrival_time', array('class' => 'form-control','placeholder'=>'Please select expected arrival time','label' => "Expected arrival time",'type' => 'text','empty'=>'true','id' => 'e_arrival_datetime', 'style' => 'margin-bottom:20px'));?>
                            <?php echo $this->Form->input('e_setup_time', array('class' => 'form-control','placeholder'=>'Please select expected setup time','label' => "Expected setup time",'type' => 'text','empty'=>'true','id' => 'e_setup_datetime', 'style' => 'margin-bottom:20px'));?>
                            <?php echo $this->Form->input('e_pickup_time', array('class' => 'form-control','placeholder'=>'Please select expected pickup time','label' => "Expected pickup time",'type' => 'text','empty'=>'true','id' => 'e_pickup_datetime', 'style' => 'margin-bottom:20px'));?>
                        </div>
                        <div class="tab-pane fade" id="stock">
                            <div class="form-group"></div>
                            <div class="form-group"><?= $this->Form->control('order_detail', ['class' => 'form-control','style' => 'margin-bottom:20px']) ?></div>
                            <div class="form-group"><?= $this->Form->control('additional_note', ['class' => 'form-control','style' => 'margin-bottom:20px']) ?></div>
                        </div>

                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
    <div class="submitButton" style="width:500px;height:500px;text-align:right">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-outline btn-primary btn-lg btn-block', 'style' => 'width:95%;margin-left:2.5%']) ?>
    <?= $this->Form->end() ?>
    </div>
</div>

<script>
    $("#job_datetime").datetimepicker({
     defaultDate: new Date(),
     step:1
     });
    $("#e_arrival_datetime").datetimepicker({
     defaultDate: new Date(),
     step:1
     });
     $("#e_setup_datetime").datetimepicker({
      defaultDate: new Date(),
      step:1
      });
      $("#e_pickup_datetime").datetimepicker({
       defaultDate: new Date(),
       step:1
       });
    $(document).ready(function() {
        $("#type_html_id").chosen();
        $("#cust_html_id").chosen();
        $("#site_html_id").chosen();
    });
</script>



