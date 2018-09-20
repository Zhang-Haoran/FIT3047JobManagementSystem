
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $this->fetch('title')?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Bootstrap core CSS-->

    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>

    <!-- Page level plugin CSS-->
    <?= $this->Html->css('/vendor/datatables/dataTables.bootstrap4.css') ?>

    <!-- Custom styles for this template-->
    <?= $this->Html->css('/css/sb-admin.css') ?>
    <!-- Datatables -->
      <?= $this->Html->css('/DataTables/datatables.min.css') ?>

    <?= $this->Html->css('/css/formStyle.css') ?>




</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="" href="/"></a>
    <?= $this->Html->link(__('InstantMarquees'), ['controller' => 'Jobs'],['class' =>'navbar-brand mr-1']) ?>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
<!--            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">-->
<!--            <div class="input-group-append">-->
<!--                <button class="btn btn-primary" type="button">-->
<!--                    <i class="fas fa-search"></i>-->
<!--                </button>-->
<!--            </div>-->
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
<!--            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                <i class="fas fa-bell fa-fw"></i>-->
<!--                <span class="badge badge-danger">9+</span>-->
<!--            </a>-->
<!--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">-->
<!--                <a class="dropdown-item" href="#">Action</a>-->
<!--                <a class="dropdown-item" href="#">Another action</a>-->
<!--                <div class="dropdown-divider"></div>-->
<!--                <a class="dropdown-item" href="#">Something else here</a>-->
<!--            </div>-->
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
<!--            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                <i class="fas fa-envelope fa-fw"></i>-->
<!--                <span class="badge badge-danger">7</span>-->
<!--            </a>-->
<!--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">-->
<!--                <a class="dropdown-item" href="#">Action</a>-->
<!--                <a class="dropdown-item" href="#">Another action</a>-->
<!--                <div class="dropdown-divider"></div>-->
<!--                <a class="dropdown-item" href="#">Something else here</a>-->
<!--            </div>-->
        </li>
        <li class="nav-item dropdown no-arrow">
<!--            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                <i class="fas fa-user-circle fa-fw"></i>-->
<!--            </a>-->
<!--            <a class="" href="#" data-toggle="modal" data-target="#logoutModal"></a>-->
            <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout'],['class' =>'nav-link']) ?>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
<!--                <a class="dropdown-item" href="#">Settings</a>-->
<!--                <a class="dropdown-item" href="#">Activity Log</a>-->
<!--                <div class="dropdown-divider"></div>-->
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
<!--        <li class="nav-item active">-->
<!--            <a class="nav-link" href="/">-->
<!--                <i class="fas fa-fw fa-tachometer-alt"></i>-->
<!--                <span>Homepage</span>-->
<!--            </a>-->
<!--        </li>-->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Jobs</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
<!--                <h6 class="dropdown-header">Ma</h6>-->
<!--                <a class="dropdown-item" href="jobs/add">Add Job</a>-->
                <?= $this->Html->link(__('Add Jobs'), ['controller' => 'Jobs', 'action' => 'add'],['class' =>'dropdown-item']) ?>
<!--                <a class="dropdown-item" href="jobs">Job List</a>-->
                <?= $this->Html->link(__('Job List'), ['controller' => 'Jobs', 'action' => 'index'],['class' =>'dropdown-item']) ?>
<!--                <a class="dropdown-item" href="forgot-password.html">Customer</a>-->
<!--                <div class="dropdown-divider"></div>-->
<!--                <h6 class="dropdown-header">Other Pages:</h6>-->
<!--                <a class="dropdown-item" href="404.html">Site</a>-->
<!--                <a class="dropdown-item" href="blank.html">Stock</a>-->
<!--                <a class="dropdown-item" href="blank.html">Material</a>-->
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Employees</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <!--                <h6 class="dropdown-header">Ma</h6>-->
<!--                <a class="dropdown-item" href="employees/add">Add Employee</a>-->
                <?= $this->Html->link(__('Add Employee'), ['controller' => 'Employees', 'action' => 'add'],['class' =>'dropdown-item']) ?>
<!--                <a class="dropdown-item" href="employees">Employee List</a>-->
                <?= $this->Html->link(__('Employee List'), ['controller' => 'Employees', 'action' => 'index'],['class' =>'dropdown-item']) ?>
                <?= $this->Html->link(__('Add Function'), ['controller' => 'Funcs', 'action' => 'add'],['class' =>'dropdown-item']) ?>
                <?= $this->Html->link(__('Function List'), ['controller' => 'Funcs', 'action' => 'index'],['class' =>'dropdown-item']) ?>
                <!--                <a class="dropdown-item" href="forgot-password.html">Customer</a>-->
                <!--                <div class="dropdown-divider"></div>-->
                <!--                <h6 class="dropdown-header">Other Pages:</h6>-->
                <!--                <a class="dropdown-item" href="404.html">Site</a>-->
                <!--                <a class="dropdown-item" href="blank.html">Stock</a>-->
                <!--                <a class="dropdown-item" href="blank.html">Material</a>-->
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Site</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <!--                <h6 class="dropdown-header">Ma</h6>-->
<!--                <a class="dropdown-item" href="sites/add">Add Site</a>-->
                <?= $this->Html->link(__('Add Site'), ['controller' => 'Sites', 'action' => 'add'],['class' =>'dropdown-item']) ?>
<!--                <a class="dropdown-item" href="sites">Site List</a>-->
                <?= $this->Html->link(__('Site List'), ['controller' => 'Sites', 'action' => 'index'],['class' =>'dropdown-item']) ?>
                <!--                <a class="dropdown-item" href="forgot-password.html">Customer</a>-->
                <!--                <div class="dropdown-divider"></div>-->
                <!--                <h6 class="dropdown-header">Other Pages:</h6>-->
                <!--                <a class="dropdown-item" href="404.html">Site</a>-->
                <!--                <a class="dropdown-item" href="blank.html">Stock</a>-->
                <!--                <a class="dropdown-item" href="blank.html">Material</a>-->
            </div>
        </li>




<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="jobs">-->
<!--<!--                <i class="fas fa-fw fa-chart-area"></i>-->-->
<!--                <i class="fas fa-fw fa-table"></i>-->
<!--                <span>Jobs</span></a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="employees">-->
<!--                <i class="fas fa-fw fa-table"></i>-->
<!--                <span>Employee</span></a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="customers">-->
<!--                <i class="fas fa-fw fa-table"></i>-->
<!--                <span>Customer</span></a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="sites">-->
<!--                <i class="fas fa-fw fa-table"></i>-->
<!--                <span>Sites</span></a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="stocks">-->
<!--                <i class="fas fa-fw fa-table"></i>-->
<!--                <span>Stock</span></a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="materials">-->
<!--                <i class="fas fa-fw fa-table"></i>-->
<!--                <span>Material</span></a>-->
<!--        </li>-->
    </ul>

    <div id="content-wrapper">
            <div class="container-fluid">
                <?php $this->Flash->render() ?>
                <?php echo $this->fetch('content') ?>

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

    <!-- /.content-wrapper -->
    <!-- Datatables caller--->


</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>




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
