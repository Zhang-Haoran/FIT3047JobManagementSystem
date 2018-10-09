<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustType $custType
 */
?>


<div class="row">
    <?= $this->Form->create($custType) ?>
    <div class="col col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Adding Customer Type
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('name', ['label' => 'Customer Type'],['class' => 'form-control']) ?></div>
                <?php
                echo $this->Form->hidden('is_deleted')
                ?>
            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success center-block btn-block btn-lg']) ?>
    </div>

</div>
