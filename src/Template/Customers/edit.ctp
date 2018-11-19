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

                                <div class="panel-body">
                                    <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','label' => 'Name','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type', 'class' => 'form-control']) ?></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    </div>

    <div class="submitButton" style="width:500px;height:500px;text-align:right">

    <?= $this->Form->end() ?>
    </div>
</div>
