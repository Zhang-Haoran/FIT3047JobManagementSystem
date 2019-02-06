<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site[]|\Cake\Collection\CollectionInterface $sites
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
        <h1 class="page-header"><?= __('Sites') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
        <thead>
            <tr>
                <th scope="col"><?= __('name') ?></th>
                <th scope="col"><?= __('address') ?></th>
                <th scope="col"><?= __('suburb') ?></th>
                <th scope="col"><?= __('postcode') ?></th>
                <th scope="col" style="max-width: 200px"><?= __('Action') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sites as $site): ?>
            <tr>
                <td><?= h($site->name) ?></td>
                <td><?= h($site->address) ?></td>
                <td><?= h($site->suburb) ?></td>
                <td><?= h($site->postcode) ?></td>
                <td><div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('View'), ['action' => 'view', $site->id], ['class' => 'btn btn-primary', 'style' => 'width:99%']) ?></div>
                    <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('Edit'), ['action' => 'edit', $site->id], ['class' => 'btn btn-warning', 'style' => 'width:99%']) ?></div>
                    <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $site->id], ['class' => 'btn btn-danger', 'style' => 'width:99%', 'confirm' => __('Are you sure you want to delete Site: {0}?', $site->name)]) ?></div>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>
</div>

<script>
    $('#dataTables').DataTable({
        responsive: true,
        colReorder: false,
    });
</script>