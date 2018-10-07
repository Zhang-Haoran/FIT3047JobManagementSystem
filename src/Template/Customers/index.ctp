<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
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
                        <th scope="col"><?= __('Contact name') ?></th>
                        <th scope="col"><?= __('Phone number') ?></th>
                        <th scope="col"><?= __('Mobile number') ?></th>
                        <th scope="col"><?= __('Email address') ?></th>
                        <th scope="col"><?= __('Type') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td class="center"><?= h($customer->full_name) ?></td>
                        <td class="center"><?= h($customer->contact) ?></td>
                        <td class="center"><?= h($customer->phone) ?></td>
                        <td class="center"><?= h($customer->mobile) ?></td>
                        <td class="center"><?= h($customer->email) ?></td>
                        <td class="center"><?= $customer->has('cust_type') ? $this->Html->link($customer->cust_type->name, ['controller' => 'CustTypes', 'action' => 'view', $customer->cust_type->id]) : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
