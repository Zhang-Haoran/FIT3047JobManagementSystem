<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */

//debug($name);
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= __('Jobs to be done') ?></h1>
        </div>
        <!-- /.col-lg-12 -->

        <!-- today panel-->
        <div id="today" class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3 huge">
                            <?php
                                $allJobs = array();
                                foreach ($jobs as $job):
                                    array_push($allJobs, $job);
                                endforeach;
                                $list = array_filter($allJobs, function($job){
                                    $today = date("Y-m-d");
                                    $job_date = $job->job_date;

                                    $today_time = strtotime($today);
                                    $job_date_time = strtotime($job_date);
                                    return $today_time == $job_date_time;
                                });
                            echo count($list);
                            ?>
                        </div>
                        <div class="col-lg-8 text-right"><h3>Today</h3></div>
                    </div>
                </div>
                <a id="today-panel">
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
                        <div class="col-xs-3 huge">
                            <?php
                                $allJobs = array();
                                foreach ($jobs as $job):
                                    array_push($allJobs, $job);
                                endforeach;
                                $list = array_filter($allJobs, function($job){
                                    $today = date("Y-m-d");
                                    $job_date = $job->job_date;

                                    $today_time = strtotime($today);
                                    $job_date_time = strtotime($job_date);
                                    return $today_time - $job_date_time <= 7;
                                });
                            echo count($list);
                            ?>
                        </div>
                        <div class="">
                            <div class="col-lg-8 text-right"><h3>Next week</h3></div>
                        </div>
                    </div>
                </div>
                <a id="nextWeek-panel">
                    <div class="panel-footer">
                        <span class="pull-left">Show</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php
        if($this->request->getsession()->read('Auth.User.access_level') <> '3'){
            echo $this->element('dashboard/quotePanel');
        }
        ?>
    </div>
<?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => ' btn btn-lg btn-success', 'style' => '']) ?>
<a id="reloadBtn" class="btn btn-lg btn-info" style="margin-left:1%">Reload</a>
    <div class="row">
        <div class="col-lg-12">
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
            <?php
                foreach ($jobs as $job): ?>
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
                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
                    <?= ($name == 1 || $name == 2)?$this->Html->link(__('Edit'), ['action' => 'edit', $job->id], ['class' => 'btn btn-warning', 'style' => 'width:100%;marign-left:1%;margin-top:1%']):"" ?>
                    <?= ($name == 1 || $name == 2)?$this->Html->link(__('Delete'), ['action' => 'delete', $job->id], ['class' => 'btn btn-danger', 'style' => 'width:100%;marign-right:1%;margin-top:1%', 'confirm' => __('Are you sure you want to delete Job: {0}?',$job->name)]):"" ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>

    <?php $this->start('script'); ?>
    <script>

    $('#quote-panel').on('click', function(){
        var table = $('#dataTables').DataTable();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var status = data[1];

                if(status === 'Quote')
                    return true;
                return false;

            }
        );

        table.draw();
    })


    $('#today-panel').on('click', function(){
        var table = $('#dataTables').DataTable();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var date = new Date (data[2]);
                var today = new Date();

                if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
                    return true;
                return false;

            }
        );

        table.draw();
    })

    $('#nextWeek-panel').on('click', function(){
        var table = $('#dataTables').DataTable();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var date = new Date (data[2]);
                var today = new Date();
                var datetime = (date.getTime() - today.getTime()) / (1000*3600*24);
                console.log(datetime);

                if(datetime <= 7 && datetime > 0)
                    return true;
                return false;

            }
        );

        table.draw();
    })


    $('#reloadBtn').on('click', function(){
        var table = $('#dataTables').DataTable({AJAX: "data.json"});
        table.AJAX.reload();
        table.draw();

    })

    $(document).ready(function() {
        var table = $('#Jobs').DataTable({
            responsive: true
        });
    });



    </script>
    <?php $this->end(); ?>
