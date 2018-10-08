<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accessory[]|\Cake\Collection\CollectionInterface $accessories
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
                </tr>
                </thead>
                <tbody>
                <?php foreach ($accessories as $accessory): ?>
                    <tr>
                        <td><?= h($accessory->name) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>