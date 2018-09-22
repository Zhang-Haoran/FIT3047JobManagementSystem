<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType $custType
 */
?>
<div class="custTypes view content columns">
    <h3><?= h($custType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($custType->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($custType->customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('First name') ?></th>
                <th scope="col"><?= __('Last name') ?></th>
                <th scope="col"><?= __('Contact person') ?></th>
                <th scope="col"><?= __('Phone number') ?></th>
                <th scope="col"><?= __('Mobile number') ?></th>
                <th scope="col"><?= __('Email address') ?></th>
            </tr>
            <?php foreach ($custType->customers as $customers): ?>
            <tr>
                <td><?= h($customers->fname) ?></td>
                <td><?= h($customers->lname) ?></td>
                <td><?= h($customers->contact) ?></td>
                <td><?= h($customers->phone) ?></td>
                <td><?= h($customers->mobile) ?></td>
                <td><?= h($customers->email) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
