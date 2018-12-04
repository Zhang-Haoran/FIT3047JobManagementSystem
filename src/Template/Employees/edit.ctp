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

                                <div class="form-group"><?= $this->Form->control('fname',  ['label' => 'First Name', 'class' => 'form-control','placeholder' => 'This field is required']); ?></div>
                                <div class="form-group"><?= $this->Form->control('lname',  ['label' => 'Last Name', 'class' => 'form-control','placeholder' => 'This field is required']); ?></div>
                                <div class="form-group"><?= $this->Form->control('phone',  ['label' => 'Phone Number', 'class' => 'form-control','placeholder' => ' +61412 345 678 or 0412 345 678']); ?></div>
                                <div class="form-group"><?= $this->Form->control('email',  ['label' => 'Email', 'class' => 'form-control','placeholder' => 'example@example.com']); ?></div>
                                <?php
                                if($this->request->getsession()->read('Auth.User.access_level')=='1'){
                                ?>
                                    <div class="form-group"><?= $this->Form->control('access_level', array('class' => 'form-control', 'type' => 'select', 'options' => $acLOptions))?></div>
                                <?php
                                }
                                ?>
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
