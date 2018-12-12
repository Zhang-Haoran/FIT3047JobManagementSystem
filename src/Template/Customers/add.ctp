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
    <?= $this->Form->create($customer) ?>

    <div class="col col-lg-6">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Customer detail
            </div>
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
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    </div>

</div>
