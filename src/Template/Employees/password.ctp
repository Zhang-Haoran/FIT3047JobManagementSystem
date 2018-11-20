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

    <?= $this->Html->css('/css/style.css') ?>

    <?= $this->Html->css('/vendor/morrisjs/morris.css') ?>

    <?= $this->Html->css('/vendor/font-awesome/css/font-awesome.min.css') ?>

</head>
<body>
<div class="container-fluid" style="margin-bottom: 10%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div style="padding-top: 25px;">
                <?= $this->Html->image('image_02.gif', ['alt' => 'Logo', 'class' => 'img-responsive center-block']) ?>
            </div>
            <div style="padding-top: 25px;">



                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reset password</h3>
                    </div>
                    <div class="panel-body">
                <?= $this->Form->create('', ['style' => 'margin-bottom:0px']); ?>

                    <div class="form-group" style="margin-bottom: 0px">
                    <?= $this->Form->control('email', ['autofocus' => true, 'required' => true,'class' => 'form-control']);?>

                    </div>

                    <?= $this->Html->link(__('Back'), ['controller' => 'Employees', 'action' => 'login'], ['class' => 'btn btn-link', 'style' => 'margin-bottom:0px;font-size:18px;']) ?>


                <?= $this->Form->button('Request reset email', ['class' => 'btn btn-lg btn-success btn-block']); ?>

                <?= $this->Form->end();?>

                　
</div>
            </div>

        </div>
        </div>
    </div>
</div>
<footer class="footer" style="position:fixed;">
    <div class="container">
        <p class="text-muted text-center pad-20">Copyright © Instant Marquees 2018</p>
    </div>
</footer>




</body>
</html>
