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

    <div id="quote" class="col-lg-3 col-md-6" style="cursor: pointer">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div id="quoteN" class="col-xs-3 huge">💛</div>
                    <div class="col-lg-8 text-right">
                        <h3>Quoted</h3>
                    </div>
                </div>
            </div>
            <a id="quote-panel" style="cursor: pointer">
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
    <?= $this->Html->link(__('New Pickup Job'), ['action' => 'addpickup'], ['class' => ' btn btn-success', 'style' => '']) ?>
    <button id="pickup" type="button" class="btn" style="background-color: #5542a9; border-color: #33276b; color: white">Show Pickup Job</button>
</div>
    <div class="row">
        <div class="col-lg-9">
            <div class="panel-body" style="margin-left:-15px;">
                <table style="max-width: 100px;" width="100%" class="table table-striped table-bordered table-hover" id="Jobs">
                    <thead>
                        <tr>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Status') ?></th>
                            <th scope="col"><?= __('Job Date') ?></th>
                            <th scope="col"><?= __('Job Time') ?></th>
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
                            <td style="width: 50%"><?= h($job->name) ?></td>
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
                                    echo h($job->event_type->name);
                                }
                                else{
                                    '';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if($job->has('customer')) {
                                    echo h($job->customer->name);
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

        <div class="col-lg-3" style="margin-top: 50px">
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

<?= $this->Html->script('/js/officestaffdashboard.js') ?>
