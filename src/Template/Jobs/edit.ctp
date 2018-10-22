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
        <h1 class="page-header"><?= __('Edit Job') ?></h1>
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
                                <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','placeholder'=>'Name']) ?></div>
                                <div class="form-group"><?= $this->Form->control('job_status', array('class' => 'form-control', 'type' => 'select', 'options' => $statusOptions)) ?></div>
                                <div class="form-group"><?= $this->Form->control('job_date', array('class' => 'form-control','placeholder'=>'Please select job date','label' => "Job Date",'type' => 'text','empty'=>'true','id' => 'job_datetime')) ?> </div>
                                <div class="form-group"><?= $this->Form->control('event_type_id', ['options' => $eventTypes, 'class' => 'form-control','id'=> 'type_html_id']) ?></div>
                                <div class="form-group"><?= $this->Form->hidden('employee_id', ['options' => $employees, 'class' => 'form-control']) ?></div>
                                <div class="form-group"><?= $this->Form->hidden('edited_by', ['class' => 'form-control']) ?></div>
                                <div class="form-group"><?= $this->Form->hidden('last_changed', ['empty' => true]) ?></div>
                            </div>

                            <div class="tab-pane fade" id="customer">

                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="form-group"><?= $this->Form->control('customer_id', ['options' => $customers, 'class' => 'form-control','id'=> 'cust_html_id']) ?></div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="site">

                                <div id="collapseThree" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="form-group"><?= $this->Form->control('site_id', ['options' => $sites, 'class' => 'form-control','id'=> 'site_html_id']) ?></div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="priceInfo">
                                <div class="form-group"></div>
                                <div class="form-group"><?= $this->Form->control('Invoice', ['class' => 'form-control','placeholder'=>'Invoice#']) ?></div>
                                <div class="form-group"><?= $this->Form->control('job_order', ['class' => 'form-control','placeholder'=>'Invoice#']) ?></div>
                                <div class="form-group"><?= $this->Form->control('quote', ['class' => 'form-control','placeholder'=>'Invoice#']) ?></div>
                            </div>
                            <div class="tab-pane fade" id="setupDetail">
                                <div class="form-group"></div>
                                <?php echo $this->Form->control('e_arrival_time', array('class' => 'form-control','placeholder'=>'Please select expected arrival time','label' => "Expected arrival time",'type' => 'text','empty'=>'true','id' => 'e_arrival_datetime', 'style' => 'margin-bottom:20px'));?>
                                <?php echo $this->Form->control('e_setup_time', array('class' => 'form-control','placeholder'=>'Please select expected setup time','label' => "Expected setup time",'type' => 'text','empty'=>'true','id' => 'e_setup_datetime', 'style' => 'margin-bottom:20px'));?>
                                <?php echo $this->Form->control('e_pickup_time', array('class' => 'form-control','placeholder'=>'Please select expected pickup time','label' => "Expected pickup time",'type' => 'text','empty'=>'true','id' => 'e_pickup_datetime', 'style' => 'margin-bottom:20px'));?>
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
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
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

        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-mismiss="modal">&times;</button>
                        <h4 class="modal-title">New customer</h4>
                    </div>
                    <div class="modal-body">
                        <?= $this->Form->create(null,['url' => ['controller' => 'Sites','action' => 'siteAdd']]) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->control('name', ['class' => 'form-control']);
                            echo $this->Form->control('address', ['class' => 'form-control']);
                            echo $this->Form->control('suburb', ['class' => 'form-control']);
                            echo $this->Form->control('postcode', ['class' => 'form-control']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
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


<form action="/JobsController.php" method="get">
    <!--quote/order/invoice goes here-->

</form>






<?php
            echo $this->Form->hidden('token');
            echo $this->Form->hidden('timeout');
            echo $this->Form->hidden('is_deleted');
        ?>
    </fieldset>
    <!--?= $this->Form->button(__('Submit')) ?-->
    <?= $this->Form->end() ?>
</div>
