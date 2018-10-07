<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<div class="row">
    <?= $this->Form->create($image) ?>
    <div class="col col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Images
                </div>
                <div class="panel-body">
                    <div class="form-group"><?= $this->Form->control('path', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('description', ['class' => 'form-control']) ?></div>
                    <div class="form-group"><?= $this->Form->control('job name', ['options' => $jobs], ['class' => 'form-control']) ?></div>
                </div>
            </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success center-block btn-block btn-lg']) ?>
        <?= $this->Form->end() ?>
    </div>

</div>
