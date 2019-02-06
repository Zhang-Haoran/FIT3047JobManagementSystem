<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>

<div>
    <button onclick="goBack()" class="btn btn-success">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>

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
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Phone Number') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col" style="max-width: 200px"><?= __('Action') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= h($employee->full_name) ?></td>
                <?php
                    if( $employee->access_level == 1)
                echo "<td class='bg-warning text-dark'>Administrator</td>";
                elseif ($employee->access_level == 2)
                echo "<td class='bg-danger text-dark'>Office Staff</td>";
                elseif($employee->access_level == 3)
                echo "<td class='bg-info text-dark'>Field Employee</td>";
                ?>
                <td><?= h($employee->phone) ?></td>
                <td><a href = "mailto:<?= ($employee->email) ?>"><?= ($employee->email) ?></a></td>
                <td><div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('View'), ['action' => 'view', $employee->id], ['class' => 'btn btn-primary', 'style' => 'width:99%']) ?></div>
                    <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id], ['class' => 'btn btn-warning', 'style' => 'width:99%']) ?></div>
                    <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px">
                        <?php
                        if($this->request->getsession()->read('Auth.User.id')!=$employee->id){
                        ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['class' => 'btn btn-danger', 'style' => 'width:99%;', 'confirm' => __('Are you sure you want to delete Employee: {0}?', $employee->full_name)]) ?>
                        <?php
                        }
                        ?>
                    </div>
                </td>


            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
        </div>
    </div>

<script>
    $('#dataTables').DataTable({
        responsive: true,
        colReorder: false,
    });
</script>