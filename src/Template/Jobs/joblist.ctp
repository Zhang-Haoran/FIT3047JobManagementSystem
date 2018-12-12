<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */

//debug($name);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Jobs</h1>
    </div>
    <!-- /.col-lg-12 -->

    <!-- today panel-->

</div>
<div class="bd-example">
    <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => ' btn btn-success', 'style' => 'margin-left:15px;']) ?>
    <?= $this->Html->link(__('New Pickup Job'), ['action' => 'addpickup'], ['class' => ' btn btn-success', 'style' => '']) ?>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="Jobs">
                <thead>
                <tr>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Status') ?></th>
                    <th scope="col"><?= __('Job Date') ?></th>
                    <th scope="col"><?= __('Job Time') ?></th>
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
                            if($job->is_deleted == '1')
                    echo "<td class='bg-default' style='color: white;background-color: #757575;'>Cancelled</td>";
                    elseif( $job->job_status == 'Order')
                    echo "<td class='bg-danger text-white'>Order</td>";
                    elseif ($job->job_status == 'Ready')
                    echo "<td class='bg-success text-white'>Ready</td>";
                    elseif($job->job_status == 'Quote')
                    echo "<td class='bg-warning text-white'>Quote</td>";
                    elseif($job->job_status == 'Completed')
                    echo "<td class='bg-info text-white'>Completed</td>";
                    ?>
                    <td><?= h($job->job_date->format('l jS F Y')) ?></td>
                    <td><?= h($job->job_date->format('g:i A')) ?></td>
                    <td class="center"><?= h($job->booked_date->format('g:i A l jS F Y')) ?></td>
                    <td class="center">$<?= $this->Number->format($job->price) ?></td>
                    <td class="center">$<?= $this->Number->format($job->deposit) ?></td>
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
</div>

<?php $this->start('script'); ?>
<script>

    $(document).ready(function() {
        $('#Jobs').DataTable({
            responsive: true,
            colReorder: false,
        });
    })

</script>
<?php $this->end(); ?>