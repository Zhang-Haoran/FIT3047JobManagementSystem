<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Stock') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>






<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Stock Name: <?=h($stock->name) ?></th>
        </div>



        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">


        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($stock->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accessory') ?></th>
            <td><?= $stock->has('accessory') ? $this->Html->link($stock->accessory->name, ['controller' => 'Accessories', 'action' => 'view', $stock->accessory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Value') ?></th>
            <td><?= $this->Number->format($stock->rent_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Min Accs') ?></th>
            <td><?= $this->Number->format($stock->min_accs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $stock->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
            </tr>
        </table>
    </div>

</div>






<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Related Stock Lines</th>
        </div>



        <table class="panel-body">
            <tr class="table-responsive">
                <?php if (!empty($stock->stock_lines)): ?>
                <table id="table" class="table table-striped table-bordered table-hover">



                <tr>
                    <th scope="col"><?= __('Stock Id') ?></th>
                    <th scope="col"><?= __('Job Id') ?></th>
                    <th scope="col"><?= __('Stock Num') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($stock->stock_lines as $stockLines): ?>
                    <tr>
                        <td><?= h($stockLines->stock_id) ?></td>
                        <td><?= h($stockLines->job_id) ?></td>
                        <td><?= h($stockLines->stock_num) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'StockLines', 'action' => 'view', $stockLines->stock_id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'StockLines', 'action' => 'edit', $stockLines->stock_id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'StockLines', 'action' => 'delete', $stockLines->stock_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockLines->stock_id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
            </tr>
        </table>
    </div>
</div>
