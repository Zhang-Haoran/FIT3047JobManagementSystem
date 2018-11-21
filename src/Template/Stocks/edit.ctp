<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
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
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Stock') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="stocks form large-9 medium-8 columns content">
    <?= $this->Form->create($stock) ?>
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
                                <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','placeholder' => 'This field is required']); ?></div>
                                <div class="form-group"><?= $this->Form->control('rent value', ['class' => 'form-control','placeholder' => 'rent value should be numeric']); ?></div>
                                <div class="form-group"><?= $this->Form->control('minimum accessory', ['class' => 'form-control','placeholder' => 'minimum accessory should be numeric']); ?></div>
                                <div class="form-group"><?= $this->Form->control('accessorie_id', ['options' => $accessories, 'empty' => true, 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->hidden('is_deleted'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    <?= $this->Form->end() ?>
</div>
