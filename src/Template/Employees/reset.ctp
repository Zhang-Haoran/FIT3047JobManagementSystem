<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 * @var \App\Model\Entity\Employee $employee
 */


$this->layout = false;
$cakeDescription = 'Instant Marquees';
?>
<html lang="en">


<head>

    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

    <?= $this->Html->css('/vendor/metisMenu/metisMenu.min.css') ?>

    <?= $this->Html->css('/css/style.css') ?>

    <?= $this->Html->css('/vendor/morrisjs/morris.css') ?>

    <?= $this->Html->css('/vendor/font-awesome/css/font-awesome.min.css') ?>

</head>
<body>

<?php $this->assign('title', 'Reset Password'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div style="padding-top: 25px;">
                <div class="panel-body">


                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Reset password</h3>
                        </div>

                <?= $this->Form->create($employee) ?>

                        <div class="form-group">

                    <?= $this->Form->control('password', ['required' => true, 'autofocus' => true,'class' => 'form-control']); ?>

                </div>

                <p class="helper">Passwords must be at least 8 characters</p>

                        <div class="form-group">

                    <?= $this->Form->control('confirm_password', ['type' => 'password', 'required' => true,'class' => 'form-control']); ?>

                </div>

                　

                <?= $this->Form->button('Submit', ['class' => 'btn btn-lg btn-success btn-block']); ?>

                <?= $this->Form->end(); ?>

            </div>

        </div>

    </div>

</div>

</body>
</html>
