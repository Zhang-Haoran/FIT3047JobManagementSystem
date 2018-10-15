<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<div class="row">
    <?= $this->Form->create($contact) ?>

    <div class="col col-lg-6">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Contact Name
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','label' => 'Name']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Contact Details
            </div>
            <div class="panel-body">

                <div class="form-group"><?= $this->Form->control('phone', ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('email', ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('role',  ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('jobs_id', ['options' => $jobs, 'label' => 'Type', 'class' => 'form-control']) ?></div>
                <?php
                echo $this->Form->hidden('is_deleted');
                ?>

            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-outline btn-primary btn-lg btn-block', 'style' => 'width:95%;margin-left:2.5%']) ?>
    </div>

</div>
