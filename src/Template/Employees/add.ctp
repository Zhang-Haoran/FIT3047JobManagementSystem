<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">
    <?= $this->Form->create($employee) ?>

    <div class="col col-lg-6">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Employee Name
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('fname', ['class' => 'form-control','label' => 'First Name']) ?></div>
                <div class="form-group"><?= $this->Form->control('lname',  ['class' => 'form-control','label' => 'Last Name']) ?></div>
            </div>
        </div>
    </div>

    <div class="col col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Employee Details
            </div>
            <div class="panel-body">

                <div class="form-group"><?= $this->Form->control('password',  ['type' => 'password','class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('confirmed_password', ['type' => 'password','class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('phone', ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('email', ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('access_level', array('class' => 'form-control', 'type' => 'select', 'options' => $acLOptions)) ?></div>
                <?php
                echo $this->Form->hidden('token');
                echo $this->Form->hidden('timeout');
                echo $this->Form->hidden('is_deleted');
                ?>

            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    </div>

</div>
