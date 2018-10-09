<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Customer') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="customers form columns content">
    <?= $this->Form->create($customer) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic details
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group"><?= $this->Form->control('fname', ['label' => 'First name', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('lname', ['label' => 'Last name', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('contact', ['label' => 'Contact number', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('phone', ['label' => 'Phone number', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('mobile', ['label' => 'Mobile number', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('email', ['label' => 'Email address', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->hidden('is_deleted'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-outline btn-primary btn-lg btn-block', 'style' => 'width:95%;margin-left:2.5%']) ?>
    </div>

    <div class="submitButton" style="width:500px;height:500px;text-align:right">

    <?= $this->Form->end() ?>
    </div>
</div>
