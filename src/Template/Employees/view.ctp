<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>


<html>
<body>

<button onclick="goBack()">Go Back</button>


<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>




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
                        <td><?= h($employee->fname) ?></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td><?= h($employee->lname) ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number:</th>
                        <td><?= h($employee->phone) ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?= h($employee->email) ?></td>
                    </tr>
                    <tr>
                        <th>Access Level:</th>
                        <?php
                        if( $employee->access_level == 1)
                        echo "<td>Administrator</td>";
                        elseif ($employee->access_level == 2)
                        echo "<td>Office Staff</td>";
                        elseif($employee->access_level == 3)
                        echo "<td>Field Employee</td>";
                        ?>

                    </tr>
                    </tbody>
                </table>
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
                                <td><?= h($jobs->job_status) ?></td>
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



















