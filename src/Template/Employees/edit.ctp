<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="employees form columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?></legend>
        <?php
        echo $this->Form->control('fname',  ['label' => 'First Name']);
        echo $this->Form->control('lname',  ['label' => 'Last Name']);
        echo $this->Form->control('password',  ['label' => 'Password']);
        //password type should be password
        echo $this->Form->control('confirmed_password',['type' => 'password']);
        //add password match feature, to make sure user don't type unexpected password.
        echo $this->Form->control('phone',  ['label' => 'Phone Number']);
        echo $this->Form->control('email',  ['label' => 'Email']);
        echo $this->Form->control('access_level',  ['label' => 'Access Level']);
        echo $this->Form->hidden('token');
        echo $this->Form->hidden('timeout');
        echo $this->Form->hidden('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
