<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accessory $accessory
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Accessories') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>






<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Customer ID: <?=h($accessory->name) ?></th>
        </div>


        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">


        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($accessory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accessory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $accessory->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
            </tr>
        </table>
    </div>

</div>
