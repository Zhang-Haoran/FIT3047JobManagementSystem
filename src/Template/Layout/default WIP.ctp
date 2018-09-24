<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <?= $this->Html->css('/vendor/datatables/dataTables.bootstrap4.css') ?>
    <?= $this->Html->css('/css/sb-admin.css') ?>
    <?= $this->Html->css('/DataTables/datatables.min.css') ?>
    <?= $this->Html->css('/css/formStyle.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body id="page-top">
#Navigation bar
<div id="container-fluid">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <?= $this->Html->link(__('InstantMarquees'), ['controller' => 'Jobs'],['class' =>'navbar-brand mr-1']) ?>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout'],['class' =>'nav-link']) ?>
        </li>
    </ul>
</nav>


<div class="row">


        <!-- Sidebar -->
        <div class="col-xl-3">
        <ul class="sidebar navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Jobs</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <?= $this->Html->link(__('Job Index'), ['controller' => 'Jobs', 'action' => 'index'],['class' =>'dropdown-item']) ?>
                    <?= $this->Html->link(__('Add Jobs'), ['controller' => 'Jobs', 'action' => 'add'],['class' =>'dropdown-item']) ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Employees</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <?= $this->Html->link(__('Employee Index'), ['controller' => 'Employees', 'action' => 'index'],['class' =>'dropdown-item']) ?>
                    <?= $this->Html->link(__('Add Employee'), ['controller' => 'Employees', 'action' => 'add'],['class' =>'dropdown-item']) ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Site</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <?= $this->Html->link(__('Site Index'), ['controller' => 'Sites', 'action' => 'index'],['class' =>'dropdown-item']) ?>
                    <?= $this->Html->link(__('Add Site'), ['controller' => 'Sites', 'action' => 'add'],['class' =>'dropdown-item']) ?>
                </div>
            </li>
        </ul>
      </div>
<div class="col-xl-9">
        <div id="container">
                  <?= $this->Flash->render() ?>
                  <div class="container clearfix">
                      <?= $this->fetch('content') ?>
                  </div>

                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto" >
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Instant Marquees 2018</span>
                        </div>
                    </div>
                </footer>
        </div>
      </div>
    </div>
  </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript-->

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
    <!--Datatables-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#dataTables').DataTable();
        } );
    </script>


    </body>
    </html>
