<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */

//debug($name);
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">We today have <p id="workForToday" style="display: inline; color: red"></p><p style="display: inline;"> job(s)</p><p id="encouragement" style="display: inline"></p></h1>
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
                            <th scope="col"><?= __('Booked Date') ?></th>
                            <th scope="col"><?= __('Price') ?></th>
                            <th scope="col"><?= __('Deposit') ?></th>
                            <th scope="col"><?= __('Expected arrival time') ?></th>
                            <th scope="col"><?= __('Expected setup time') ?></th>
                            <th scope="col"><?= __('Expected pickup time') ?></th>
                            <th scope="col"><?= __('Site') ?></th>
                            <th scope="col"><?= __('Event type') ?></th>
                            <th scope="col"><?= __('Customer') ?></th>
                            <th scope="col"><?= __('Created by') ?></th>
                            <th scope="col"><?= __('Action') ?></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jobs as $job): ?>
                        <tr>
                            <?php   if($job->is_deleted == '1'){?>
                                <td class='bg-danger'><?= h($job->name) ?></td>
                            <?php
                            }else{
                                ?>
                                <td><?= h($job->name) ?></td>
                            <?php
                            }
                            ?>


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
                            <td class="center"><?= h($job->booked_date) ?></td>
                            <td class="center"><?= $this->Number->format($job->price) ?></td>
                            <td class="center"><?= $this->Number->format($job->deposit) ?></td>
                            <td class="center"><?= h($job->e_arrival_time) ?></td>
                            <td class="center"><?= h($job->e_setup_time) ?></td>
                            <td class="center"><?= h($job->e_pickup_time) ?></td>
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
                            <td style="width:6%">
                                <?php if($job->is_pickup == 1){
                                    echo $this->Html->link(__('View'), ['action' => 'viewpickup', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']);
                                } else{
                                    echo $this->Html->link(__('View'), ['action' => 'view', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']);
                                }
                                ?>



                                <?php if($name == 1 || $name == 2){
                                    if($job->is_pickup == 1){
                                        echo $this->Html->link(__('Edit'), ['action' => 'editpickup', $job->id], ['class' => 'btn btn-warning', 'style' => 'width:100%;marign-left:1%;margin-top:1%']);
                                    }
                                    else{
                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $job->id], ['class' => 'btn btn-warning', 'style' => 'width:100%;marign-left:1%;margin-top:1%']);
                                    }

                                }else{
                                    '';
                                }
                                ?>

                                <?php   if($job->is_deleted == '1'){?>
                                    <?= ($name == 1 || $name == 2)?$this->Html->link(__('Undelete'), ['action' => 'undelete', $job->id], ['class' => 'btn btn-danger', 'style' => 'width:100%;marign-right:1%;margin-top:1%', 'confirm' => __('Are you sure you want to undelete Job: {0}?',$job->name)]):"" ?>
                                    <?php
                        }else{
                            ?>
                            <?= ($name == 1 || $name == 2)?$this->Html->link(__('Delete'), ['action' => 'delete', $job->id], ['class' => 'btn btn-danger', 'style' => 'width:100%;marign-right:1%;margin-top:1%', 'confirm' => __('Are you sure you want to delete Job: {0}?',$job->name)]):"" ?>
                            <?php
                        }
                        ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Notification</div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">danger</a>
                        <a href="#" class="list-group-item">heading</a>
                        <a href="#" class="list-group-item">info</a>
                        <a href="#" class="list-group-item">success</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->start('script'); ?>
    <script>

    var button = -1;
    var arrayOfData = [];
    var number = {quoteN: 0, todayN: 0, nextWeekN:0, total: 0};

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

    function quote(data){
        let status = data[1];

        if(status === 'Quote')
            return true;
        return false;
    }

    function today(data){
        let date = new Date (data[2]);
        let today = new Date();
        let status = data[1];

        if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && status !== 'Quote')
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

        if(status === 'Quote')
            number.quoteN++;
        if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && status !== 'Quote')
            number.todayN++;
        else if(datetime <= 7 && datetime > 0)
            number.nextWeekN++;
        number.total++;
    }

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            if(button == 3)
                return quote(data);
            else if(button == 2)
                return nextWeek(data);
            else if(button == 1)
                return today(data);
            else if(button == -1)
                return getCount(data);
            else return true;

        }
    );



    $(document).ready(function() {
        var table = $('#Jobs').DataTable({
            responsive: true,
            colReorder: false,
            buttons: [
                'csvHtml5'
            ]
        });

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

        button = 0;
        table.draw();
        encourage();
        document.getElementById('quoteN').innerHTML = number.quoteN;
        document.getElementById('nextWeekN').innerHTML = number.nextWeekN;
        document.getElementById('todayN').innerHTML = number.todayN;
        document.getElementById('total').innerHTML = number.total;
        document.getElementById('workForToday').innerHTML = number.todayN;



    });

    </script>
    <?php $this->end(); ?>
