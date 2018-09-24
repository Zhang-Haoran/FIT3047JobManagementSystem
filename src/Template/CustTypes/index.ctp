<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType[]|\Cake\Collection\CollectionInterface $custTypes
 */
?>
<div class="custTypes index content columns">
    <h3><?= __('Customer Types') ?></h3>
    <table cellpadding="0" cellspacing="0" id="datatables" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col"><?=__('Customer Types') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($custTypes as $custType): ?>
            <tr>
                <td><?= h($custType->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
