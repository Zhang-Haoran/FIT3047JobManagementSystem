<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
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

    <?= $this->Html->css('/dist/css/sb-admin-2.css') ?>

    <?= $this->Html->css('/vendor/morrisjs/morris.css') ?>

    <?= $this->Html->css('/vendor/font-awesome/css/font-awesome.min.css') ?>

</head>
<body>

<div class="limiter">

    <div class="container-login100">

        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

            <div class="users-form">

                <a class="login100-form-title p-b-49">Reset Password</a>

                <?= $this->Form->create(); ?>

                <div class="wrap-input100 m-b-23">

                    <?= $this->Form->control('email', ['autofocus' => true, 'required' => true]);?>

                </div>

                <?= $this->Form->button('Request reset email', ['class' => 'login100-form-btn']); ?>

                <?= $this->Form->end();?>

                　

            </div>

        </div>

    </div>

</div>

</body>
</html>
