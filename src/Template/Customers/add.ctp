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
                Customer detail
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','label' => 'Name']) ?></div>
                <div class="form-group"><?= $this->Form->control('cust_type_id', ['options' => $custTypes, 'label' => 'Type', 'class' => 'form-control']) ?></div>

            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success center-block btn-block btn-lg']) ?>
    </div>

</div>
