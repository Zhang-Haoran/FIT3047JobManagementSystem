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
                <div class="form-group"><?= $this->Form->control('fname', ['label' => 'First Name'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('lname', ['label' => 'Last Name'], ['class' => 'form-control']) ?></div>
            </div>
        </div>
    </div>

    <div class="col col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Employee Details
            </div>
            <div class="panel-body">

                <div class="form-group"><?= $this->Form->control('password', ['label' => 'Password'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('confirmed_password', ['type' => 'password'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('phone', ['label' => 'Phone Number'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('email', ['label' => 'Email'], ['class' => 'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('access_level', ['label' => 'Access Level'], ['class' => 'form-control']) ?></div>
                <?php
                echo $this->Form->hidden('token');
                echo $this->Form->hidden('timeout');
                echo $this->Form->hidden('is_deleted');
                ?>

            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success center-block btn-block btn-lg']) ?>
    </div>

</div>
