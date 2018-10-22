<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>


<div class="row">
    <?= $this->Form->create($stock) ?>

    <div class="col col-lg-6">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Stock Name
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control']) ?></div>
            </div>
        </div>
    </div>

    <div class="col col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Stock Details
            </div>
            <div class="panel-body">

                <div class="form-group"><?= $this->Form->control('rent value', ['class' => 'form-control','min'=>'0',  'value'=>'0', 'step'=>'1']) ?></div>
                <div class="form-group"><?= $this->Form->control('minimum accessory', ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('accessorie_id', ['label' => 'Accessory', 'options' => $accessories, 'empty' => true,'class' => 'form-control']) ?></div>


            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    </div>

</div>
