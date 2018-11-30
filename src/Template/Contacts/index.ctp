<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
 */
?>

<div>
    <button onclick="goBack()" class="btn btn-success">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>



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
                <th scope="col"><?= __('Fist Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('phone') ?></th>
                <th scope="col"><?= __('email') ?></th>
                <th scope="col"><?= __('role') ?></th>
                <th scope="col"><?= __('Action') ?></th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= h($contact->fname) ?></td>
                <td><?= h($contact->lname) ?></td>
                <td><?= h($contact->phone) ?></td>
                <td><?= h($contact->email) ?></td>
                <td><?= h($contact->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</div>
</div>
