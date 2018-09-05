<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialLine[]|\Cake\Collection\CollectionInterface $materialLines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Material Line'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialLines index large-9 medium-8 columns content">
    <h3><?= __('Material Lines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('material_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mat_in') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mat_out') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materialLines as $materialLine): ?>
            <tr>
                <td><?= $materialLine->has('material') ? $this->Html->link($materialLine->material->material_id, ['controller' => 'Materials', 'action' => 'view', $materialLine->material->material_id]) : '' ?></td>
                <td><?= $materialLine->has('job') ? $this->Html->link($materialLine->job->job_id, ['controller' => 'Jobs', 'action' => 'view', $materialLine->job->job_id]) : '' ?></td>
                <td><?= $this->Number->format($materialLine->mat_in) ?></td>
                <td><?= $this->Number->format($materialLine->mat_out) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $materialLine->material_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materialLine->material_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materialLine->material_id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialLine->material_id)]) ?>
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
