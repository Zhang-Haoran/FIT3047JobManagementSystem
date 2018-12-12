<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<div>
    <button onclick="goBack()" class="btn btn-success">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>

<div class="row">
    <?= $this->Form->create($employee) ?>

    <div class="col col-lg-6">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Employee Name
            </div>
            <div class="panel-body">
                <div class="form-group"><?= $this->Form->control('fname', ['class' => 'form-control','label' => 'First Name','placeholder' => 'This field is required']) ?></div>
                <div class="form-group"><?= $this->Form->control('lname',  ['class' => 'form-control','label' => 'Last Name','placeholder' => 'This field is required']) ?></div>
            </div>



            <div class="panel-heading">
                Employee Details
            </div>
            <div class="panel-body">

                <div class="form-group"><?= $this->Form->control('password',  ['type' => 'password','class' => 'form-control','placeholder' => 'At least 6 characters']) ?></div>
                <div class="form-group"><?= $this->Form->control('confirmed_password', ['type' => 'password','class' => 'form-control','placeholder' => 'Same as above']) ?></div>
                <div class="form-group"><?= $this->Form->control('phone', ['class' => 'form-control','placeholder' => ' +61412 345 678 or 0412 345 678']) ?></div>
                <div class="form-group"><?= $this->Form->control('email', ['class' => 'form-control','placeholder' => 'example@example.com']) ?></div>
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