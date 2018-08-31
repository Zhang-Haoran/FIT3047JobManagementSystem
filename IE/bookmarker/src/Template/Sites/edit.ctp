<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $site->site_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $site->site_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sites form large-9 medium-8 columns content">
    <?= $this->Form->create($site) ?>
    <fieldset>
        <legend><?= __('Edit Site') ?></legend>
        <?php
            echo $this->Form->control('site_name');
            echo $this->Form->control('site_address');
            echo $this->Form->control('site_suburb');
            echo $this->Form->control('site_postcode');
            echo $this->Form->control('site_melways');
            echo $this->Form->control('site_contact');
            echo $this->Form->control('site_mobile');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
