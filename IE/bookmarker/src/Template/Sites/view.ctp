<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Site'), ['action' => 'edit', $site->site_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Site'), ['action' => 'delete', $site->site_id], ['confirm' => __('Are you sure you want to delete # {0}?', $site->site_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sites view large-9 medium-8 columns content">
    <h3><?= h($site->site_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Site Name') ?></th>
            <td><?= h($site->site_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Address') ?></th>
            <td><?= h($site->site_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Suburb') ?></th>
            <td><?= h($site->site_suburb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Postcode') ?></th>
            <td><?= h($site->site_postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Melways') ?></th>
            <td><?= h($site->site_melways) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Contact') ?></th>
            <td><?= h($site->site_contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Mobile') ?></th>
            <td><?= h($site->site_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Id') ?></th>
            <td><?= $this->Number->format($site->site_id) ?></td>
        </tr>
    </table>
</div>
