<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= __('Jobs') ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= h($job->name) ?></td>
                <?php
                if( $job->job_status == 'Started')
                    echo "<td class='p-3 mb-2 bg-primary text-white'>Started</td>";
                elseif ($job->job_status == 'Confirmed')
                    echo "<td class='p-3 mb-2 bg-danger text-white'>Confirmed</td>";
                elseif($job->job_status == 'Quote')
                    echo "<td class='p-3 mb-2 bg-info text-white'>Quote</td>";
                elseif($job->job_status == 'Completed')
                    echo "<td class='p-3 mb-2 bg-secondary text-white'>Completed</td>";
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
                <td><?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                <?= $this->Html->link(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete Job: {0}?',$job->name)]) ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>

