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
                <div class="form-group"><?= $this->Form->control('name', ['label' => 'Stock Name'], ['class' => 'form-control']) ?></div>
            </div>
        </div>
    </div>

    <div class="col col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Employee Details
            </div>
            <div class="panel-body">

                <div class="form-group"><?= $this->Form->control('rent_value', ['label' => 'Rent Value'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('min_accs', ['label' => 'Minimum'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('accessorie_id', ['label' => 'Accessory Name'], ['options' => $accessories, 'empty' => true], ['class' => 'form-control']) ?></div>


            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success center-block btn-block btn-lg']) ?>
    </div>

</div>
