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


<!-- Sticky Footer -->


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div style="padding-top: 25px;">
                <?= $this->Html->image('image_02.gif', ['alt' => 'Logo', 'class' => 'img-responsive center-block']) ?>
            </div>
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create() ?>
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'E-mail', 'autofocus']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
                            </div>
                            <div class="nav-link">
                                <?= $this->Html->link(__('Forgot Password'), ['controller' => 'Employees', 'action' => 'password'], ['class' => 'btn btn-link']) ?>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <?= $this->Form->button(__('Login'), ['class' => 'btn btn-lg btn-success btn-block']) ?>
                        </fieldset>
                    </form>
                    <?= $this->Form->end() ?>
                </div>
                <div class="copyright text-center my-auto">
                    <span>Copyright © Instant Marquees 2018</span>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <div class="container">

                </div>
            </div>
        </div>
    </footer>
</div>


<!-- jQuery -->
<?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>

<!-- Bootstrap Core JavaScript -->
<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.min.js') ?>

<!-- Metis Menu Plugin JavaScript -->
<?= $this->Html->script('/vendor/metisMenu/metisMenu.min.js') ?>

<!-- Custom Theme JavaScript -->
<?= $this->Html->script('/js/script.js') ?>

<!-- Moment.js -->
<?= $this->Html->script('/vendor/momentjs/moment.js') ?>


</body>

</html>
