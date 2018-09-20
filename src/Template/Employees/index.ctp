<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<div class="employees index columns content">
    <h3><?= __('Employees') ?></h3>
    <table cellpadding="0" cellspacing="0" id="datatables" class="display" style="width:100%"z>
        <thead>
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Phone Number') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Access Level') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= h($employee->full_name) ?></td>
                <td><?= h($employee->phone) ?></td>
                <td><?= h($employee->email) ?></td>
                <td><?= $this->Number->format($employee->access_level) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
