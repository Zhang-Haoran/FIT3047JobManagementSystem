<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Contacts') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
        <thead>
            <tr>
                <th scope="col"><?= __('id') ?></th>
                <th scope="col"><?= __('name') ?></th>
                <th scope="col"><?= __('phone') ?></th>
                <th scope="col"><?= __('email') ?></th>
                <th scope="col"><?= __('role') ?></th>
                <th scope="col"><?= __('jobs') ?></th>
                <th scope="col"><?= __('Action') ?></th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= $this->Number->format($contact->id) ?></td>
                <td><?= h($contact->name) ?></td>
                <td><?= h($contact->phone) ?></td>
                <td><?= h($contact->email) ?></td>
                <td><?= h($contact->role) ?></td>
                <td><?= $contact->has('job') ? $this->Html->link($contact->job->name, ['controller' => 'Jobs', 'action' => 'view', $contact->job->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
