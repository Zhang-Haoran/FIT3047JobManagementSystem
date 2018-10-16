<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Employee') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>




<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th> Employee details</th>
        </div>
            <div class="table-responsive">
                <table id="quotation_comps" class="table table-striped table-bordered table-hover">

                    <tbody>
                    <tr>
                        <th>First Name:</th>
                        <th><?= h($employee->fname) ?></th>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td><?= h($employee->lname) ?></td>
                    </tr>


                    <tr>
                        <th>Phone Number:</th>
                        <th><?= h($employee->phone) ?></th>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <th><?= h($employee->email) ?></th>
                    </tr>
                    <tr>
                        <th>Access Level:</th>
                        <th><?= h($employee->access_level) ?></th>
                    </tr>



                    </tbody>
                </table>

                <!--                            -->
            </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th> Jobs created by employee</th>
        </div>


        <table class="panel-body">
            <tr class="table-responsive">
                <?php if (!empty($employee->jobs)): ?>
                    <table id="table" class="table table-striped table-bordered table-hover">


                        <tr>
                            <th scope="row"><?= __('Name') ?></th>
                            <th scope="row"><?= __('Status') ?></th>
                            <th scope="row"><?= __('Job Date') ?></th>
                            <th scope="row"><?= __('Booked Date') ?></th>

                            <th scope="row" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($employee->jobs as $jobs): ?>
                            <tr>
                                <td><?= h($jobs->name) ?></td>
                                <td><?= h($jobs->status) ?></td>
                                <td><?= h($jobs->job_date) ?></td>
                                <td><?= h($jobs->booked_date) ?></td>

                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </tr>
        </table>
    </div>
</div>



















