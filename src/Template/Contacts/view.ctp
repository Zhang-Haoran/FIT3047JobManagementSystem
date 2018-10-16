<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Customer Type') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>



<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Contact Name: <?= h($contact->name) ?></th>
        </div>

        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">

        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($contact->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($contact->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contact->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($contact->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $contact->has('job') ? $this->Html->link($contact->job->name, ['controller' => 'Jobs', 'action' => 'view', $contact->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contact->id) ?></td>
        </tr>
    </table>
            </tr>
        </table>
    </div>
</div>
