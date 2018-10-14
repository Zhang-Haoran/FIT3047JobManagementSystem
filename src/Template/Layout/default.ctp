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
 * @var \App\View\AppView $this
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
    <!-- CSS -->
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/vendor/metisMenu/metisMenu.min.css') ?>
    <?= $this->Html->css('https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/cr-1.5.0/fh-3.1.4/r-2.2.2/sl-1.2.6/datatables.css') ?>
    <?= $this->Html->css('/vendor/datatables-responsive/dataTables.responsive.css') ?>
    <?= $this->Html->css('/css/style.css') ?>
    <?= $this->Html->css('/vendor/morrisjs/morris.css') ?>
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.3.1/css/all.css') ?>

    <?= $this->Html->css('/css/animate.css') ?>
    <?= $this->Html->css('bootstrap-multiselect.css') ?>
    <?= $this->Html->css('chosen.min.css') ?>
    <?= $this->Html->css('select2.min.css') ?>
    <?= $this->Html->css('chosen_bootstrap.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body onload="initialize()">
<div class="container-fluid">
    <div id="wrapper">
        <!-- Navigation -->
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                echo $this->Html->image('logo-new.png', ['alt' => 'Logo', 'class' => 'navbar-brand'])
                ?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"></a>
                            <?php
                            echo $this->Html->link('<i class="fa fa-user fa-fw"></i> User Profile', ['controller' => 'employees', 'action' => 'edit','1'], ['escape' => false])
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link('<i class="fa fa-sign-out fa-fw"></i> Logout', ['controller' => 'employees', 'action' => 'logout'], ['escape' => false])
                            ?>
                        </li>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <?php
                            echo $this->Html->link('<i class="fa fa-dashboard fa-fw"></i> Dashboard', ['controller' => 'jobs', 'action' => 'index'], ['escape' => false])
                            ?>
                        </li>
                        <li>
                            <a href="#"><i class=""></i> Jobs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                    echo $this->Html->link('Index', ['controller' => 'jobs', 'action' => 'index'], ['escape' => false])
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Add', ['controller' => 'jobs', 'action' => 'add'])
                                    ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class=""></i> Employees<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                    echo $this->Html->link('Index', ['controller' => 'employees', 'action' => 'index'])
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Add', ['controller' => 'employees', 'action' => 'add'])
                                    ?>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class=""></i> Customers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                    echo $this->Html->link('Index', ['controller' => 'customers', 'action' => 'index'])
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Add', ['controller' => 'customers', 'action' => 'add'])
                                    ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class=""></i> Sites<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                    echo $this->Html->link('Index', ['controller' => 'sites', 'action' => 'index'])
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Add', ['controller' => 'sites', 'action' => 'add'])
                                    ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class=""></i> Stocks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                    echo $this->Html->link('Index', ['controller' => 'stocks', 'action' => 'index'])
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Add', ['controller' => 'stocks', 'action' => 'add'])
                                    ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class=""></i> Accessories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                    echo $this->Html->link('Index', ['controller' => 'Accessories', 'action' => 'index'])
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Add', ['controller' => 'Accessories', 'action' => 'add'])
                                    ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class=""></i> Types<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Customer Types <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?php
                                            echo $this->Html->link('Index', ['controller' => 'CustTypes', 'action' => 'index'])
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            echo $this->Html->link('Add', ['controller' => 'CustTypes', 'action' => 'add'])
                                            ?>
                                        </li>
                                    </ul>
                                </li>
                                <!-- /.nav-third-level -->
                                <li>
                                    <a href="#">Event Types <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <?php
                                            echo $this->Html->link('Index', ['controller' => 'EventTypes', 'action' => 'index'])
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            echo $this->Html->link('Add', ['controller' => 'EventTypes', 'action' => 'add'])
                                            ?>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class=""></i> Contacts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php
                                    echo $this->Html->link('Index', ['controller' => 'contacts', 'action' => 'index'])
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Add', ['controller' => 'contacts', 'action' => 'add'])
                                    ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">
                <?= $this->fetch('content') ?>
            </div>


        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="text-muted text-center">Copyright © Instant Marquees 2018</p>
        </div>
    </footer>
</div>

<!-- /#wrapper -->

<!-- javascript -->
<?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.min.js') ?>
<?= $this->Html->script('/vendor/metisMenu/metisMenu.min.js') ?>
<?= $this->Html->script('/vendor/raphael/raphael.min.js') ?>
<?= $this->Html->script('/vendor/morrisjs/morris.min.js') ?>
<?= $this->Html->script('/data/morris-data.js') ?>
<?= $this->Html->script('https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/cr-1.5.0/fh-3.1.4/r-2.2.2/sl-1.2.6/datatables.js') ?>
<?= $this->Html->script('/vendor/momentjs/moment.js') ?>
<?= $this->Html->script('/js/bootstrap-notify.js') ?>
<?= $this->Html->script('chosen.jquery.js') ?>
<?= $this->Html->script('select2.min.js') ?>
<?= $this->Html->script('bootstrap-multiselect.js') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWDodbWDP0gwQTVe0_1R3WSAn8fsq7lQQ&callback=initMap"
        async defer></script>
<?= $this->Html->script('/js/script.js') ?>

<?= $this->Flash->render() ?>
<?= $this->fetch('script'); ?>



</body>
</html>
