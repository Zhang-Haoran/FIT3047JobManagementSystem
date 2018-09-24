<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= __('Employees') ?></h1>
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
                <th scope="col"><?= __('Phone Number') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Access Level') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= h($employee->full_name) ?></td>
                <td><?= h($employee->phone) ?></td>
                <td><?= h($employee->email) ?></td>
                <td class="center"><?= $this->Number->format($employee->access_level) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
        </div>
    </div>

