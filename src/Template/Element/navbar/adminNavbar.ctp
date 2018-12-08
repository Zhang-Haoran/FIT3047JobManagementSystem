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
                        <?php
                        $employees_ID =$this->request->getsession()->read('Auth.User.id');
                        echo $this->Html->link('<i class="fa fa-user fa-fw"></i> User Profile', ['controller' => 'employees', 'action' => 'edit',$employees_ID], ['escape' => false])
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Html->link('<i class="fas fa-sign-out-alt"></i> Logout', ['controller' => 'employees', 'action' => 'logout'], ['escape' => false])
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
                        echo $this->Html->link('Dashboard', ['controller' => 'jobs', 'action' => 'index'], ['escape' => false])
                        ?>
                    </li>
                    <li>
                        <a href="#"><i class=""></i> Jobs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php
                                echo $this->Html->link('Job List', ['controller' => 'jobs', 'action' => 'index'], ['escape' => false])
                                ?>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link('Add Normal job', ['controller' => 'jobs', 'action' => 'add'])
                                ?>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link('Add Pickup job', ['controller' => 'jobs', 'action' => 'addpickup'])
                                ?>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link('Event Types List', ['controller' => 'EventTypes', 'action' => 'index'])
                                ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->

                    <li>

                        <a href="#"><i class=""></i> Employees<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php
                                echo $this->Html->link('Employee List', ['controller' => 'employees', 'action' => 'index'])
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
                                echo $this->Html->link('Customer List', ['controller' => 'customers', 'action' => 'index'])
                                ?>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link('Add', ['controller' => 'customers', 'action' => 'add'])
                                ?>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link('Customer Types List', ['controller' => 'CustTypes', 'action' => 'index'])
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
                                echo $this->Html->link('Contact List', ['controller' => 'contacts', 'action' => 'index'])
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
                    <li>
                        <a href="#"><i class=""></i> Sites<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php
                                echo $this->Html->link('Site List', ['controller' => 'sites', 'action' => 'index'])
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
                                echo $this->Html->link('Stock List', ['controller' => 'stocks', 'action' => 'index'])
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
                                echo $this->Html->link('Accessory List', ['controller' => 'Accessories', 'action' => 'index'])
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




                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>



</div>
