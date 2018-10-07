<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType[]|\Cake\Collection\CollectionInterface $custTypes
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Customer Types') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                <thead>
                    <tr>
                        <th scope="col"><?=__('Types') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($custTypes as $custType): ?>
                    <tr>
                        <td class="center"><?= h($custType->name) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
