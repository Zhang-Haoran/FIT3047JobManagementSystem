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
    <?= $this->Html->css('https://cdn.datatables.net/v/bs/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/fh-3.1.4/r-2.2.2/datatables.min.css') ?>
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


</head>
<body>

<div>


    <?php
    if($this->request->getsession()->read('Auth.User.access_level')=='1'){
        echo $this->element('navbar/adminNavbar');

    }
    if($this->request->getsession()->read('Auth.User.access_level')=='2'){
        echo $this->element('navbar/officeStaffNavbar');

    }
    if($this->request->getsession()->read('Auth.User.access_level')=='3'){
        echo $this->element('navbar/fieldStaffNavbar');

    }


    ?>

    <div id="page-wrapper">

        <div class="container-fluid">
            <?= $this->fetch('content') ?>
        </div>


    </div>
</div>


</body>
<footer class="footer">
    <div class="container">
        <p class="text-muted text-center">Copyright © Instant Marquees 2018</p>
    </div>
</footer>

<!-- /#wrapper -->

<!-- calling all the java scripts dependencies -->
<?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.min.js') ?>
<?= $this->Html->script('/vendor/metisMenu/metisMenu.min.js') ?>
<?= $this->Html->script('/vendor/raphael/raphael.min.js') ?>
<?= $this->Html->script('/vendor/morrisjs/morris.min.js') ?>
<?= $this->Html->script('/data/morris-data.js') ?>
<?= $this->Html->script('https://cdn.datatables.net/v/bs/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/fh-3.1.4/r-2.2.2/datatables.min.js') ?>
<?= $this->Html->script('/vendor/momentjs/moment.js') ?>
<?= $this->Html->script('/js/bootstrap-notify.js') ?>
<?= $this->Html->script('chosen.jquery.js') ?>
<?= $this->Html->script('select2.min.js') ?>
<?= $this->Html->script('bootstrap-multiselect.js') ?>
<?= $this->fetch('scriptBottom'); ?>

<!--calling script.js-->
<?= $this->Html->script('/js/script.js') ?>

<!--Call for code from script render and from the buffered block-->
<?= $this->fetch('script'); ?>
<!--reder Flash-->
<?= $this->Flash->render() ?>

</html>
