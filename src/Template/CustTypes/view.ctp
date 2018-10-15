<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType $custType
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Customer Type') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>




<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Customer Type List</th>
        </div>

        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">

        <tr>
            <th scope="col"><?= __('Name') ?></th>
            <td><?= h($custType->name) ?></td>
        </tr>
    </table>

</div>
