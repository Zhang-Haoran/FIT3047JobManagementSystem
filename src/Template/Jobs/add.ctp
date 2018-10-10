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

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Select existing customer</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="form-group"><?= $this->Form->control('customer_id', ['options' => $customers, 'class' => 'form-control','id'=> 'cust_html_id']) ?></div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Create new customer</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <button type="button" class="btn-default" data-toggle="modal" data-target = "#myModal">new</button>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="site"><div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Select existing site</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="form-group"><?= $this->Form->control('site_id', ['options' => $sites, 'class' => 'form-control','id'=> 'site_html_id']) ?></div>
                                </div>
                            </div>
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Create new site</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>


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

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-mismiss="modal">&times;</button>
                        <h4 class="modal-title">New customer</h4>
                    </div>
                    <div class="modal-body">
                        <?= $this->Form->create(null,['url' => ['controller' => 'Customers','action' => 'jobAdd']]) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->control('fname', ['label' => 'First name','class' => 'form-control']);
                            echo $this->Form->control('lname', ['label' => 'Last name','class' => 'form-control']);
                            echo $this->Form->control('contact', ['label' => 'Contact name','class' => 'form-control']);
                            echo $this->Form->control('phone', ['label' => 'Phone number','class' => 'form-control']);
                            echo $this->Form->control('mobile', ['label' => 'Mobile number','class' => 'form-control']);
                            echo $this->Form->control('email', ['label' => 'Email address','class' => 'form-control']);
                            echo $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type','class' => 'form-control']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
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



