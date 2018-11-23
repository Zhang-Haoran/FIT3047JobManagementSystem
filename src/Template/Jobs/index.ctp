<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
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
                <a onclick="hideQuoted()">
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
                <a onclick="hideQuoted()">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
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
        <tbody id="non-quoted">
            <?php
                $allJobs = array();
                    foreach ($jobs as $job):
                        array_push($allJobs, $job);
                    endforeach;
                $jobList = array_filter($allJobs, function($job){
                return $job->job_status <> 'Quoted';
                });
                foreach ($jobList as $job): ?>
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
                <td><?= $job->has('site') ? $this->Html->link($job->site->name, ['controller' => 'Sites', 'action' => 'view', $job->site->id]) : '' ?></td>
                <td><?= $job->has('event_type') ? $this->Html->link($job->event_type->name, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->id]) : '' ?></td>
                <td><?= $job->has('customer') ? $this->Html->link($job->customer->name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
                <td class="center"><?= $job->has('employee') ? $this->Html->link($job->employee->full_name, ['controller' => 'Employees', 'action' => 'view', $job->employee->id]) : '' ?></td>
                <td>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                    <?= $this->Html->link(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete Job: {0}?',$job->name)]) ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
        <tbody id="quoted" style="display: none">
            <?php
                $allJobs = array();
                    foreach ($jobs as $job):
                        array_push($allJobs, $job);
                    endforeach;
                $jobList = array_filter($allJobs, function($job){
                return $job->job_status == 'Quoted';
                });
                foreach ($jobList as $job): ?>
            <tr>
                <td><?= h($job->name) ?></td>
                <?php
                    if( $job->job_status == 'Started')
                echo "<td class='bg-danger text-white'>Started</td>";
                elseif ($job->job_status == 'Confirmed')
                echo "<td class='bg-success text-white'>Confirmed</td>";
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
                <td><?= $job->has('site') ? $this->Html->link($job->site->name, ['controller' => 'Sites', 'action' => 'view', $job->site->id]) : '' ?></td>
                <td><?= $job->has('event_type') ? $this->Html->link($job->event_type->name, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->id]) : '' ?></td>
                <td><?= $job->has('customer') ? $this->Html->link($job->customer->name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
                <td class="center"><?= $job->has('employee') ? $this->Html->link($job->employee->full_name, ['controller' => 'Employees', 'action' => 'view', $job->employee->id]) : '' ?></td>
                <td>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                    <?= $this->Html->link(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete Job: {0}?',$job->name)]) ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
<script>
    function hideQuoted(){
        var quotedRef = document.getElementById('quoted');
        var nonquotedRef = document.getElementById('non-quoted');
        quotedRef.style.display = 'none';
        nonquotedRef.style.display = 'block';
    }
</script>

