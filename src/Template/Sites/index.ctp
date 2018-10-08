<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site[]|\Cake\Collection\CollectionInterface $sites
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Sites') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
        <thead>
            <tr>
                <th scope="col"><?= __('name') ?></th>
                <th scope="col"><?= __('address') ?></th>
                <th scope="col"><?= __('suburb') ?></th>
                <th scope="col"><?= __('postcode') ?></th>
                <th scope="col"><?= __('Action') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sites as $site): ?>
            <tr>
                <td><?= h($site->name) ?></td>
                <td><?= h($site->address) ?></td>
                <td><?= h($site->suburb) ?></td>
                <td><?= h($site->postcode) ?></td>
                <td><?= $this->Html->link(__('View'), ['action' => 'view', $site->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $site->id]) ?>
                    <?= $this->Html->link(__('Delete'), ['action' => 'delete', $site->id]) ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
