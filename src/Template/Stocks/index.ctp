<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>
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
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('rent_value') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('min_accs') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('accessorie_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
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
                            <?= $this->Html->link(__('View'), ['action' => 'view', $stock->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stock->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete: {0}?', $stock->name)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
