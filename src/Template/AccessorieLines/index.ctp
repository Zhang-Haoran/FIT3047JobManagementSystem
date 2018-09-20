<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessorieLine[]|\Cake\Collection\CollectionInterface $accessorieLines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Accessorie Line'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accessories'), ['controller' => 'Accessories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accessory'), ['controller' => 'Accessories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accessorieLines index large-9 medium-8 columns content">
    <h3><?= __('Accessorie Lines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('accessorie_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('accs_in') ?></th>
                <th scope="col"><?= $this->Paginator->sort('accs_out') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accessorieLines as $accessorieLine): ?>
            <tr>
                <td><?= $accessorieLine->has('accessory') ? $this->Html->link($accessorieLine->accessory->name, ['controller' => 'Accessories', 'action' => 'view', $accessorieLine->accessory->id]) : '' ?></td>
                <td><?= $accessorieLine->has('job') ? $this->Html->link($accessorieLine->job->name, ['controller' => 'Jobs', 'action' => 'view', $accessorieLine->job->id]) : '' ?></td>
                <td><?= $this->Number->format($accessorieLine->accs_in) ?></td>
                <td><?= $this->Number->format($accessorieLine->accs_out) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accessorieLine->accessorie_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accessorieLine->accessorie_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accessorieLine->accessorie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessorieLine->accessorie_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
