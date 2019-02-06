<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
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
        <h1 class="page-header"><?= __('Stocks') ?></h1>
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
                        <th scope="col"><?= __('Rent value') ?></th>
                        <th scope="col"><?= __('Minimum accessory') ?></th>
                        <th scope="col"><?= __('Accessory') ?></th>
                        <th scope="col" class="actions" style="max-width: 200px"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stocks as $stock): ?>
                    <tr>
                        <td class="center"><?= h($stock->name) ?></td>
                        <td class="center"><?= $this->Number->currency($stock->rent_value) ?></td>
                        <td class="center"><?= $this->Number->format($stock->min_accs) ?></td>
                        <td class="center"><?= $stock->has('accessory') ? $this->Html->link($stock->accessory->name, ['controller' => 'Accessories', 'action' => 'view', $stock->accessory->id]) : '' ?></td>
                        <td class="actions">
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('View'), ['action' => 'view', $stock->id], ['class' => 'btn btn-primary', 'style' => 'width:99%']) ?></div>
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('Edit'), ['action' => 'edit', $stock->id], ['class' => 'btn btn-warning', 'style' => 'width:99%']) ?></div>
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stock->id], ['class' => 'btn btn-danger', 'style' => 'width:99%', 'confirm' => __('Are you sure you want to delete: {0}?', $stock->name)]) ?></div>
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