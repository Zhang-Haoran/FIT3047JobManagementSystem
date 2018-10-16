<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<div class="row">
    <?= $this->Form->create($image,['enctype'=> 'multipart/form-data']) ?>
    <div class="col col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Upload Images
                </div>
                <div class="panel-body">
                    <div class="form-group"><?= $this->Form->control('path', ['type' => 'file','label' =>__('Select Image')]) ?></div>
                </div>
                <div class="panel-heading">
                    Images Information
                </div>
                <div class="panel-body">
                    <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('job name', ['options' => $jobs], ['class' => 'form-control']) ?></div>
                </div>
            </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success center-block btn-block btn-lg']) ?>
        <?= $this->Form->end() ?>
    </div>

</div>
