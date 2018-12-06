<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */

//debug($name);
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Today we have <p id="workForToday" style="display: inline; color: red"></p><p style="display: inline;"> job(s) left</p><p id="encouragement" style="display: inline"></p></h1>
        </div>
        <!-- /.col-lg-12 -->

        <!-- today panel-->
        <div id="today" class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div id="todayN" class="col-xs-3 huge">❤️</div>
                        <div class="col-lg-8 text-right"><h3>Today</h3></div>
                    </div>
                </div>
                <a id="today-panel" style="cursor: pointer">
                    <div class="panel-footer">
                        <span class="pull-left">Show</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- coming week panel-->
        <div id="nextWeek" class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div id="nextWeekN" class="col-xs-3 huge">💙</div>
                        <div class="">
                            <div class="col-lg-8 text-right"><h3>Next week</h3></div>
                        </div>
                    </div>
                </div>
                <a id="nextWeek-panel" style="cursor: pointer">
                    <div class="panel-footer">
                        <span class="pull-left">Show</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    <?php echo $this->element('dashboard/quotePanel'); ?>

    <div id="allJob" class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div id="total" class="col-xs-3 huge">💚</div>
                    <div class="">
                        <div class="col-lg-8 text-right"><h3>All Job</h3></div>
                    </div>
                </div>
            </div>
            <a id="allJob-panel"  style="cursor: pointer">
                <div class="panel-footer">
                    <span class="pull-left">Show</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    </div>
<div class="bd-example">
    <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => ' btn btn-success', 'style' => '']) ?>
    <?= $this->Html->link(__('Download CSV'), ['action' => 'exportJobData'], ['class' => ' btn btn-success', 'style' => '']) ?>
</div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="Jobs">
                    <thead>
                        <tr>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Status') ?></th>
                            <th scope="col"><?= __('Job Date') ?></th>
                            <th scope="col"><?= __('Price') ?></th>
                            <th scope="col"><?= __('Deposit') ?></th>
                            <th scope="col"><?= __('Site') ?></th>
                            <th scope="col"><?= __('Event type') ?></th>
                            <th scope="col"><?= __('Customer') ?></th>
                            <th scope="col"><?= __('Created by') ?></th>
                            <th scope="col"><?= __('Booked Date') ?></th>
                            <th scope="col"><?= __('Action') ?></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($jobs as $job):
                                    if($job->is_deleted == '0'){
                                ?>
                        <tr>
                            <td><?= h($job->name) ?></td>
                            <?php
                            if( $job->job_status == 'Order')
                            echo "<td class='bg-danger text-white'>Order</td>";
                            elseif ($job->job_status == 'Ready')
                            echo "<td class='bg-success text-white'>Ready</td>";
                            elseif($job->job_status == 'Quote')
                            echo "<td class='bg-warning text-white'>Quote</td>";
                            elseif($job->job_status == 'Completed')
                            echo "<td class='bg-info text-white'>Completed</td>";
                            ?>
                            <td><?= h($job->job_date) ?></td>
                            <td class="center">$<?= $this->Number->format($job->price) ?></td>
                            <td class="center">$<?= $this->Number->format($job->deposit) ?></td>
                            <td>
                                <?php if( $job->has('site')){
                                    if($name == 1 || $name == 2){
                                        echo $this->Html->link($job->site->name, ['controller' => 'Sites', 'action' => 'view', $job->site->id]);
                                    }
                                    else{
                                        echo h($job->site->name);
                                    }
                                }
                                else{
                                    '';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if($job->has('event_type')) {
                                    if ($name == 1 || $name == 2) {
                                        echo $this->Html->link($job->event_type->name, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->id]);
                                    }
                                    else{
                                        echo h($job->event_type->name);
                                    }
                                }
                                else{
                                    '';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if($job->has('customer')) {
                                    if ($name == 1 || $name == 2) {
                                        echo $this->Html->link($job->customer->name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]);
                                    }
                                    else{
                                        echo h($job->customer->name);
                                    }
                                }
                                else{
                                    '';
                                }
                                ?>
                            </td>
                            <td class="center">
                                <?php if($job->has('employee')){
                                    if ($name == 1 || $name == 2) {
                                        echo $this->Html->link($job->employee->full_name, ['controller' => 'Employees', 'action' => 'view', $job->employee->id]);
                                    }
                                    else    {
                                        echo h($job->employee->full_name);
                                    }
                                }
                                else{
                                    '';
                                }
                                ?>
                            </td>
                            <td class="center"><?= h($job->booked_date) ?></td>
                            <td style="width:6%">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id], ['class' => 'btn btn-warning', 'style' => 'width:100%;marign-left:1%;margin-top:1%']) ?>
                                <?= $this->Html->link(__('Delete'), ['action' => 'delete', $job->id], ['class' => 'btn btn-danger', 'style' => 'width:100%;marign-right:1%;margin-top:1%', 'confirm' => __('Are you sure you want to delete Job: {0}?',$job->name)]) ?>
                            </td>
                        </tr>
                        <?php
                                    }
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Today Summary</div>
                <div class="panel-body">
                    <div class="list-group">
                        <a id="totalC" href="#" class="list-group-item">Total Jobs
                            <span id="totalN" class="pull-right text-muted small">0</span>
                        </a>
                        <a id="orderC" href="#" class="list-group-item">Jobs on order
                            <span id="orderN" class="pull-right text-muted small">0</span>
                        </a>
                        <a id="readyC" href="#" class="list-group-item">Jobs on ready
                            <span id="readyN" class="pull-right text-muted small">0</span>
                        </a>
                        <a id="completedC" href="#" class="list-group-item">Jobs completed
                            <span id="completedN" class="pull-right text-muted small">0</span>
                        </a>
                        <a id="invoicedC" href="#" class="list-group-item">Jobs Invoiced
                            <span id="invoicedN" class="pull-right text-muted small">0</span>
                        </a>
                        <a id="paidC" href="#" class="list-group-item">Jobs Paid
                            <span id="paidN" class="pull-right text-muted small">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->start('script'); ?>
    <script>

    var button = -1;
    var number = {quoteN: 0, orderN: 0, readyN: 0, completedN: 0, invoiceN: 0, paidN: 0, todayN: 0, nextWeekN:0, total: 0, tTotal: 0};

    function statusCheck(data, status, today){
        let jobStatus = data[1];
        if(today)
            if (date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && jobStatus === status)
                return true;
            else return false;
        else if(jobStatus === status)
            return true;
        return false;
    }

    function encourage(){
        let randomN = Math.floor(Math.random()*10 + 1);
        let encouragement = [', have a nice day!', ', do your best!', ', you got this!', ', what a day!', ', lets do this!', ', just another day in the office!', ', good luck!',
            ', you are filled with determination!', ', lets get this over with', ', marquees! Marquees everywhere!', ', piece of cake!'];
        if(number.todayN === 0) {
            document.getElementById('workForToday').style.color = "green";
            randomN = 0;
        }
        document.getElementById('encouragement').innerHTML = encouragement[randomN];
    }

    function today(data, once){
        let date = new Date (data[2]);
        let today = new Date();
        let status = data[1];

        if(once === 1) {
            if (date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && status !== 'Completed')
                return true;
        }
        else if(once === 0)
            if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
                return true;
        return false;
    }

    function nextWeek(data){
        let date = new Date (data[2]);
        let today = new Date();
        let datetime = (date.getTime() - today.getTime()) / (1000*3600*24);

        if(datetime <= 7 && datetime > 1)
            return true;
        return false;
    }

    function getCount(data){
        let status = data[1];
        let date = new Date (data[2]);
        let today = new Date();
        let datetime = (date.getTime() - today.getTime()) / (1000*3600*24);

        if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear()) {
            number.tTotal++;
            if (status !== 'Completed')
                number.todayN++;
        }

        else if(datetime <= 7 && datetime > 0)
            number.nextWeekN++;
        number.total++;

        if(status === 'Quote')
            number.quoteN++;
        if(status === 'Order' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
            number.orderN++;
        if(status === 'Ready' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
            number.readyN++;
        if(status === 'Completed' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
            number.completedN++;
        if(status === 'Invoice' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
            number.invoiceN++;
        if(status === 'Paid' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
            number.paidN++;

    }

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            switch (button){
                case -2:
                    return today(data, 0);
                case -1:
                    return getCount(data);
                case 0:
                    return true;
                case 1:
                    return today(data, 1);
                case 2:
                    return nextWeek(data);
                case 3:
                    return statusCheck(data, 'Quote', false);
                case 4:
                    return statusCheck(data, 'Order', true);
                case 5:
                    return statusCheck(data, 'Ready',true);
                case 6:
                    return statusCheck(data, 'Completed', true);
                case 7:
                    return statusCheck(data, 'Invoice', true);
                case 8:
                    return statusCheck(data, 'Paid', true);
            }

        }
    );



    $(document).ready(function() {
        var table = $('#Jobs').DataTable();

        $('#quote-panel').on('click', function(){
            button = 3;

            table.draw();
        });


        $('#today-panel').on('click', function(){
            button = 1;

            table.draw();
        });


        $('#nextWeek-panel').on('click', function(){
            button = 2;
            table.draw();
        });


        $('#allJob-panel').on('click', function(){
            button = 0;
            table.draw();

        });

        $('#totalC').on('click', function(){
            button = -2;
            table.draw();

        });

        $('#orderC').on('click', function(){
            button = 4;
            table.draw();

        });

        $('#readyC').on('click', function(){
            button = 5;
            table.draw();

        });

        $('#completedC').on('click', function(){
            button = 6;
            table.draw();

        });

        $('#invoicedC').on('click', function(){
            button = 7;
            table.draw();

        });

        $('#paidC').on('click', function(){
            button = 8;
            table.draw();

        });

        button = 0;
        table.draw();
        encourage();
        document.getElementById('quoteN').innerHTML = number.quoteN;
        document.getElementById('orderN').innerHTML = number.orderN;
        document.getElementById('readyN').innerHTML = number.readyN;
        document.getElementById('completedN').innerHTML = number.completedN;
        document.getElementById('invoicedN').innerHTML = number.invoiceN;
        document.getElementById('paidN').innerHTML = number.paidN;
        document.getElementById('nextWeekN').innerHTML = number.nextWeekN;
        document.getElementById('todayN').innerHTML = number.todayN;
        document.getElementById('total').innerHTML = number.total;
        document.getElementById('totalN').innerHTML = number.tTotal;
        document.getElementById('workForToday').innerHTML = number.todayN;



    });

    </script>
    <?php $this->end(); ?>
