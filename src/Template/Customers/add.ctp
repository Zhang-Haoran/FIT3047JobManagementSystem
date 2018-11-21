<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>


<html>
<body>

<button onclick="goBack()">Go Back</button>


<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>

<div class="row">
    <?= $this->Form->create($customer) ?>

    <div class="col col-lg-6">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Customer detail
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','label' => 'Name','placeholder' => 'This field is required']) ?></div>
                <div class="form-group"><?= $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type', 'class' => 'form-control']) ?></div>

            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    </div>

</div>
