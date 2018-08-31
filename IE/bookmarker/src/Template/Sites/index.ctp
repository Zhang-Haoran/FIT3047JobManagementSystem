<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site[]|\Cake\Collection\CollectionInterface $sites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Site'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sites index large-9 medium-8 columns content">
    <h3><?= __('Sites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('site_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_suburb') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_postcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_melways') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_mobile') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sites as $site): ?>
            <tr>
                <td><?= $this->Number->format($site->site_id) ?></td>
                <td><?= h($site->site_name) ?></td>
                <td><?= h($site->site_address) ?></td>
                <td><?= h($site->site_suburb) ?></td>
                <td><?= h($site->site_postcode) ?></td>
                <td><?= h($site->site_melways) ?></td>
                <td><?= h($site->site_contact) ?></td>
                <td><?= h($site->site_mobile) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $site->site_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $site->site_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $site->site_id], ['confirm' => __('Are you sure you want to delete # {0}?', $site->site_id)]) ?>
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
