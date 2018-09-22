<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="customers form columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->control('fname', ['label' => 'First name']);
            echo $this->Form->control('lname', ['label' => 'Last name']);
            echo $this->Form->control('contact', ['label' => 'Contact number']);
            echo $this->Form->control('phone', ['label' => 'Phone number']);
            echo $this->Form->control('mobile', ['label' => 'Mobile number']);
            echo $this->Form->control('email', ['label' => 'Email address']);
            echo $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type']);
            echo $this->Form->hidden('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
