<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->image_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->image_id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->image_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="images view large-9 medium-8 columns content">
    <h3><?= h($image->image_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image Path') ?></th>
            <td><?= h($image->image_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $image->has('job') ? $this->Html->link($image->job->job_id, ['controller' => 'Jobs', 'action' => 'view', $image->job->job_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Id') ?></th>
            <td><?= $this->Number->format($image->image_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Image Descrp') ?></h4>
        <?= $this->Text->autoParagraph(h($image->image_descrp)); ?>
    </div>
</div>
