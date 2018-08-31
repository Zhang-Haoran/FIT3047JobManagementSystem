<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Func[]|\Cake\Collection\CollectionInterface $funcs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Func'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcs index large-9 medium-8 columns content">
    <h3><?= __('Funcs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('func_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('func_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcs as $func): ?>
            <tr>
                <td><?= $this->Number->format($func->func_id) ?></td>
                <td><?= h($func->func_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $func->func_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $func->func_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $func->func_id], ['confirm' => __('Are you sure you want to delete # {0}?', $func->func_id)]) ?>
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
