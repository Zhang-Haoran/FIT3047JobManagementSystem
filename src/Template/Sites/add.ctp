<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>

<div class="row">
    <?= $this->Form->create($site) ?>
    <div class="col col-lg-6">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    Basic details
                </div>
                <div class="panel-body">
                       <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control']) ?></div>
                </div>
            </div>
    </div>
    <div class="col col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Site Address
                </div>
                <div class="panel-body">
                    <div class="form-group"><?= $this->Form->control('address', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('suburb', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('postcode', ['class' => 'form-control']) ?></div>
                </div>
            </div>
    </div>
</div>
    <div class="row justify-content-end">
        <div class="col-lg-3">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
        </div>
    </div>
