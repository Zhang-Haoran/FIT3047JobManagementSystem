<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Employee') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="employees form columns content">
    <?= $this->Form->create($employee) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic details
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group"><?= $this->Form->control('fname',  ['label' => 'First Name', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('lname',  ['label' => 'Last Name', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('password',  ['label' => 'Password','type' => 'password','value' => '', 'class' => 'form-control']); ?></div>
                                <!--password type should be password-->
                                <div class="form-group"><?= $this->Form->control('confirmed_password',['type' => 'password','value' => '', 'class' => 'form-control']); ?></div>
                                <!--add password match feature, to make sure user don't type unexpected password.-->
                                <div class="form-group"><?= $this->Form->control('phone',  ['label' => 'Phone Number', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('email',  ['label' => 'Email', 'class' => 'form-control']); ?></div>
                                <div class="form-group"><?= $this->Form->control('access_level',  ['label' => 'Access Level', 'class' => 'form-control']); ?></div>
                                <?php
                                echo $this->Form->hidden('token');
                                echo $this->Form->hidden('timeout');
                                echo $this->Form->hidden('is_deleted');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    <?= $this->Form->end() ?>
</div>
