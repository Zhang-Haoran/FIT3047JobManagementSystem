<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
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
        <h1 class="page-header"><?= __('Customers') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th scope="col"><?= __('Name') ?></th>
                        <th scope="col"><?= __('Type') ?></th>
                        <th scope="col" style="max-width: 200px"><?= __('Action') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td class="center"><?= h($customer->name) ?></td>
                        <td class="center"><?= $customer->has('cust_type') ? $this->Html->link($customer->cust_type->name, ['controller' => 'CustTypes', 'action' => 'view', $customer->cust_type->id]) : '' ?></td>
                        <td><div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('View'), ['action' => 'view', $customer->id], ['class' => 'btn btn-primary', 'style' => 'width:99%']) ?></div>
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id], ['class' => 'btn btn-warning', 'style' => 'width:99%']) ?></div>
                            <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['class' => 'btn btn-danger', 'style' => 'width:99%;', 'confirm' => __('Are you sure you want to delete Customer: {0}?', $customer->name)]) ?></div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#dataTables-example').DataTable({
        responsive: true,
        colReorder: false,
    });
</script>