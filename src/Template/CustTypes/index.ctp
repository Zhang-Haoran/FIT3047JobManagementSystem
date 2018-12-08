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
                        <th scope="col"><?= __('Action') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($custTypes as $custType): ?>
                    <tr>
                        <td class="center"><?= h($custType->name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $custType->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custType->id], ['confirm' => __('Are you sure you want to delete Customer Type: {0}?', $custType->name)]) ?>
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