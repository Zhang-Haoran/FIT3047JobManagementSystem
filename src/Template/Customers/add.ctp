<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>


<div class="row">
    <?= $this->Form->create($customer) ?>

    <div class="col col-lg-6">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Customer Name
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('fname', ['label' => 'First Name'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('lname', ['label' => 'Last Name'], ['class' => 'form-control']) ?></div>
            </div>
        </div>
    </div>

    <div class="col col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Customer Details
            </div>
            <div class="panel-body">

                <div class="form-group"><?= $this->Form->control('contact', ['Contact name'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('phone', ['label' => 'Phone Number'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('mobile', ['label' => 'Mobile Number'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('email', ['label' => 'Email Address'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type'], ['class' => 'form-control']) ?></div>
                <?php
                echo $this->Form->hidden('is_deleted');
                ?>

            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success center-block btn-block btn-lg']) ?>
    </div>

</div>
