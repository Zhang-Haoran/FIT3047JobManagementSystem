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

    <div id="allJob" class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div id="total" class="col-xs-3 huge">💚</div>
                    <div class="">
                        <div class="col-lg-8 text-right"><h3>All Incomplete</h3></div>
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

   <div class="row">

        <div class="col-lg-12">
            <div class="panel-body" style="margin-left: -15px">
                <table width="100%" class="table table-striped table-bordered table-hover" id="Jobs">
                    <thead>
                        <tr>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Action') ?></th>
                            <th scope="col"><?= __('Status') ?></th>
                            <th scope="col"><?= __('Event date') ?></th>
                            <th scope="col"><?= __('Event time') ?></th>
                            <th scope="col"><?= __('Expected arrival time') ?></th>
                            <th scope="col"><?= __('Expected setup time') ?></th>
                            <th scope="col"><?= __('Expected pickup time') ?></th>
                            <th scope="col"><?= __('Site') ?></th>
                            <th scope="col"><?= __('Customer') ?></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $arrayOfJobs = array();
                            foreach ($jobs as $job):
                                if($job->job_status != 'Quote' && $job->job_status != 'Invoice' && $job->job_status != 'Paid' && $job->is_deleted == '0')
                                    array_push($arrayOfJobs, $job);
                            endforeach;
                            $list = array_filter($arrayOfJobs, function($job){
                                return $job->job_status != 'Quote';
                            });

                            foreach ($list as $job):

                                if($job->job_status != "Completed"){
                        ?>
                        <tr>
                            <td><?= h($job->name) ?></td>
                            <td style="width:6%">
                                <?php
                                    if ($job->job_status == "Order"){
                                echo $this->Html->link(__('View'), ['action' => 'orderview', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']);
                                }
                                elseif($job->job_status == "Ready"){
                                echo $this->Html->link(__('View'), ['action' => 'readyview', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ;
                                }
                                else{
                                echo $this->Html->link(__('View'), ['action' => 'completedview', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ;
                                }
                                ?>
                            </td>
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
                            <td><?= h($job->job_date->format('l jS F Y')) ?></td>
                            <td><?= h($job->job_date->format('H:i A')) ?></td>

                            <td class="center"><?= is_null($job->e_arrival_time)?h($job->e_arrival_time):h($job->e_arrival_time->format('H:i A')) ?></td>
                            <td class="center"><?= is_null($job->e_setup_time)?h($job->e_setup_time):h($job->e_setup_time->format('H:i A')) ?></td>
                            <td class="center"><?= is_null($job->e_pickup_time)?h($job->e_pickup_time): h($job->e_pickup_time->format('H:i A'))?></td>
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


                        </tr>
                        <?php
                            }
                            endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

<?= $this->Html->script('/js/fieldstaffdashboard.js') ?>