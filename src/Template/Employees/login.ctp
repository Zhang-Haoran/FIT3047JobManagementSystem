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
        <?= $this->fetch('title')?>
    </title>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <?= $this->Html->css('/vendor/datatables/dataTables.bootstrap4.css') ?>
    <?= $this->Html->css('/css/sb-admin.css') ?>
    <?= $this->Html->css('/DataTables/datatables.min.css') ?>
    <?= $this->Html->css('/css/formStyle.css') ?>

</head>
<body>

<div>


    <img src="img/image_02.jpg" style="
         margin: auto;
         display: block;
         padding: 15px;
         ">

         <div id="content-wrapper">

                 <div class="container-fluid">
    <div class="container" style="background: white; margin-bottom: 100px">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <div class="users form"  style="padding: 10px">

                    <?= $this->Flash->render() ?>

                    <?= $this->Form->create() ?>
                    <div class="form-label-group">
                        <?= $this->Form->control('email') ?>
                    </div>
                    <div class="form-label-group">
                        <?= $this->Form->control('password') ?>
                    </div>

                    <div class="text-center" style="line-height: 50px">
                        <?= $this->Html->link(__('forgot password'), ['controller' => 'Employees', 'action' =>'password'], ['class' => 'd-block small'])?>
                    </div>

                    <?= $this->Form->button('Login', ['class' => 'btn btn-primary btn-block']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

        <!-- Sticky Footer -->



    <footer class="sticky-footer" style="width: 100%; position: fixed">
        <div class="container my-auto" style="width: 100%">
            <div class="copyright text-center my-auto">
                <span>Copyright © Instant Marquees 2018</span>
            </div>
        </div>
    </footer>
        </div>



<?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>

<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

    <!-- Core plugin JavaScript-->

<?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js') ?>

    <!-- Page level plugin JavaScript-->

<?= $this->Html->script('/vendor/chart.js/Chart.min.js') ?>

<?= $this->Html->script('/vendor/datatables/jquery.dataTables.js') ?>

<?= $this->Html->script('/vendor/datatables/dataTables.bootstrap4.js') ?>

    <!-- Custom scripts for all pages-->

<?= $this->Html->script('/js/sb-admin.min.js') ?>

    <!-- Demo scripts for this page-->

<?= $this->Html->script('/js/demo/datatables-demo.js') ?>

<?= $this->Html->script('/js/demo/chart-area-demo.js') ?>

</body>

</html>
