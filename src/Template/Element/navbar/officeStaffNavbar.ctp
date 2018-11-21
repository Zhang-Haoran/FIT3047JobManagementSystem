<body>
<div id="wrapper"  >
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
            echo $this->Html->link($this->Html->image('logo-new.png', ['alt' => 'Logo', 'class' => 'navbar-brand']), ['controller' => 'jobs', 'action' => 'index'], ['escape' => false])
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



</div>
