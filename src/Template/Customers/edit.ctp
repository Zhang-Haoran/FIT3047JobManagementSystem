<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
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
        <h1 class="page-header"><?= __('Edit Customer') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="customers form columns content">
    <?= $this->Form->create($customer) ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic details
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="panel-body">
                                    <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','label' => 'Name','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('phone', ['class' => 'form-control','label' => 'Phone','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('email', ['class' => 'form-control','label' => 'Email','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('address', ['class' => 'form-control','label' => 'Address','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('suburb', ['class' => 'form-control','label' => 'Suburb','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('city', ['class' => 'form-control','label' => 'City','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('postcode', ['class' => 'form-control','label' => 'Postcode','placeholder' => 'This field is required']) ?></div>
                                    <div class="form-group"><?= $this->Form->control('is_business',['label' => 'is business?','class' => 'checkbox','type' => 'checkbox']); ?></div>
                                    <div class="form-group"><?= $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type', 'class' => 'form-control']) ?></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
        </div>

    </div>

    <div class="submitButton" style="width:500px;height:500px;text-align:right">

    <?= $this->Form->end() ?>
    </div>
</div>
