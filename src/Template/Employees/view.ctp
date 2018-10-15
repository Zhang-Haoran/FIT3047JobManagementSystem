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
            <th>Employee ID:<?= h($employee->id) ?></th>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="quotation_comps" class="table table-striped table-bordered table-hover">

                    <tbody>
                    <tr>
                        <th>ID:</th>
                        <th><?= h($employee->id) ?></th>
                    </tr>
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
</div>



<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Related jobs</th>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="quotation_comps" class="table table-striped table-bordered table-hover">

                    <tbody>
                    <tr>
                        <th>Job ID:</th>


                        <th>Job Name:</th>
                    </tr>
                        <?php if (!empty($employee->jobs)): ?>
                        <?php foreach ($employee->jobs as $jobs): ?>
                            <tr>
                                <td><?= h($jobs->id) ?></td>
                                <td><?= h($jobs->name) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tr>



                    </tbody>
                </table>

                <!--                            -->
            </div>
        </div>
    </div>
</div>
























