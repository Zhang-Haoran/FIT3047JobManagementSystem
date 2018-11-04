<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>

<?= $this->html->css('jquery.datetimepicker.min.css')?>
<?= $this->html->script('jquery.datetimepicker.full.js', ['block' => 'scriptBottom']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Job') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?= $this->Form->create($job) ?>
<div class="row">
    <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#job" data-toggle="tab">Job</a>
                    </li>
                    <li><a href="#customer" data-toggle="tab">Customer</a>
                    </li>
                    <li><a href="#contacts" data-toggle="tab">Contacts</a>
                    </li>
                    <li><a href="#site" data-toggle="tab">Site</a>
                    </li>
                    <li><a href="#priceInfo" data-toggle="tab">Billing Info</a>
                    </li>
                    <li><a href="#stock" data-toggle="tab">Stock & Order Detail</a>
                    </li>
                </ul>
                <div class="panel-body">
                        <div class="tab-pane fade in active" id="job">
                          <div class="tab-content">
                            <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','placeholder'=>'Name']) ?></div>
                            <div class="form-group"><?= $this->Form->control('job_status', array('class' => 'form-control', 'type' => 'select', 'options' => $statusOptions)) ?></div>
                            <div class="form-group"><?= $this->Form->control('job_date', array('class' => 'form-control','placeholder'=>'Please select job date','label' => "Event Date",'type' => 'text','empty'=>'true','id' => 'job_datetime')) ?> </div>
                            <div class="form-group"><?= $this->Form->control('event_type_id', ['options' => $eventTypes, 'class' => 'form-control','id'=> 'type_html_id']) ?></div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group"><?php echo $this->Form->control('e_arrival_time', array('class' => 'form-control','placeholder'=>'Please select expected arrival time','label' => 'Arrive by','type' => 'text','empty'=>'true','id' => 'e_arrival_datetime'));?></div>
                            <div class="form-group"><?php echo $this->Form->control('e_setup_time', array('class' => 'form-control','placeholder'=>'Please select expected setup time','label' => 'Setup by','type' => 'text','empty'=>'true','id' => 'e_setup_datetime'));?></div>
                            <div class="form-group"><?php echo $this->Form->control('e_pickup_time', array('class' => 'form-control','placeholder'=>'Please select expected pickup time','label' => 'Pickup after','type' => 'text','empty'=>'true','id' => 'e_pickup_datetime'));?></div>
                          </div>
                          </div>
                          </div>

                      </div>

                        <div class="tab-pane fade" id="customer">
                          <div class="panel-group" id="accordion">
                                <div class="panel panel-default">

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
                                    <a data-parent="#accordion" href="#collapseTwo" data-toggle="modal" data-target = "#custAdd" >Create new customer</a>
                                </h4>
                            </div>
                        </div>
                      </div>
                    </div>

                        <div class="tab-pane fade" id="site">

                          <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                  <div class="panel-heading">
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
                                        <a data-parent="#accordion" href="#collapseTwo" data-toggle="modal" data-target = "#siteAdd" >Create new site</a>
                                    </h4>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="priceInfo">
                          <div class="form-group"><?= $this->Form->control('quote', ['class' => 'form-control','placeholder'=>'Quote#']) ?></div>
                            <div class="form-group"><?= $this->Form->control('job_order', ['class' => 'form-control','placeholder'=>'Order#','label' => 'Order']) ?></div>
                            <div class="form-group"><?= $this->Form->control('Invoice', ['class' => 'form-control','placeholder'=>'Invoice#']) ?></div>
                            <div class="form-group"><?= $this->Form->control('price', ['class' => 'form-control', 'min'=>'0',  'value'=>'0', 'step'=>'1']) ?></div>
                            <div class="form-group"><?= $this->Form->control('deposit', ['class' => 'form-control', 'min'=>'0', 'value'=>'0', 'step'=>'1']) ?></div>
                        </div>


                        <div class="tab-pane fade" id="stock">
                            <div class="form-group"><?= $this->Form->control('order_detail', ['class' => 'form-control']) ?></div>
                            <div class="form-group"><?= $this->Form->control('additional_note', ['class' => 'form-control']) ?></div>
                        </div>

                        <div class="tab-pane fade" id="contacts">
                          <h1>Work in progress</h1>
                        </div>

                      </div>
                    </div>
    <div class ="col-lg-12">
      <div class="submitButton">
      <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg']) ?>
      <?= $this->Form->end() ?>
    </div>
    </div>
    </div>

        <div class="modal fade" id="custAdd" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">New Customer</h4>
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
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg' ,'disabled']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

</div>

<div class="modal fade" id="siteAdd" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New site</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create(null,['url' => ['controller' => 'Sites','action' => 'siteAdd']]) ?>
                <fieldset>
                    <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('address', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('suburb', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('postcode', ['class' => 'form-control']) ?></div>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit' ,'disabled']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

</div>


<?php
  $this->Html->scriptStart(array("block"=>'script'));
?>
$("#job_datetime").datetimepicker({
 defaultDate: new Date(),
 assumeNearbyYear: true,
 step:30
 });
$("#e_arrival_datetime").datetimepicker({
 defaultDate: new Date(),
 step:30
 });
 $("#e_setup_datetime").datetimepicker({
  defaultDate: new Date(),
  step:30
  });
  $("#e_pickup_datetime").datetimepicker({
   defaultDate: new Date(),
   step:30
   });

   $("#job_datetime").on("dp.change", function (e) {
       $('#e_arrival_datetime').data("DateTimePicker").maxDate(e.date);
       $('#e_setup_datetime').data("DateTimePicker").maxDate(e.date);
       $('#e_pickup_datetime').data("DateTimePicker").minDate(e.date);
   });
   $("#e_arrival_datetime").on("dp.change", function (e) {
       $('#e_setup_datetime').data("DateTimePicker").minDate(e.date);
   });
   $("#e_setup_datetime").on("dp.change", function (e) {
       $('#e_pickup_datetime').data("DateTimePicker").minDate(e.date);
   });


;


$(document).ready(function() {
    $("#type_html_id").chosen();
    $("#cust_html_id").chosen();
    $("#site_html_id").chosen();
});
<?php
  $this->Html->scriptEnd();
?>
