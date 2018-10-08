<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessorieLine[]|\Cake\Collection\CollectionInterface $accessorieLines
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Accessories Lines') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                <thead>
                <tr>
                    <th scope="col"><?= __('Accessories') ?></th>
                    <th scope="col"><?= __('Jobs') ?></th>
                    <th scope="col"><?= __('Accessories in') ?></th>
                    <th scope="col"><?= __('Accessories in') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($accessorieLines as $accessorieLine): ?>
                    <tr>
                        <td><?= $accessorieLine->has('accessory') ? $this->Html->link($accessorieLine->accessory->name, ['controller' => 'Accessories', 'action' => 'view', $accessorieLine->accessory->id]) : '' ?></td>
                        <td><?= $accessorieLine->has('job') ? $this->Html->link($accessorieLine->job->name, ['controller' => 'Jobs', 'action' => 'view', $accessorieLine->job->id]) : '' ?></td>
                        <td><?= $this->Number->format($accessorieLine->accs_in) ?></td>
                        <td><?= $this->Number->format($accessorieLine->accs_out) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
