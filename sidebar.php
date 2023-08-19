<?php ini_set('display_errors', 0);
include("connection.php");
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: auto">
    <!-- Brand Logo -->
    <a href=" #" class="brand-link">
        <span class="brand-text font-weight-light"><b>COGENT</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Ekta Mangal</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php 

                if($_SESSION['type']=='1')   //multi-auth
                {
                ?>
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="usermanagement.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="role.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Role Master
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <?php 
                }
                else
                {
                ?>
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                            <!--<i class="right fas fa-angle-left"></i>-->
                        </p>
                    </a>
                </li>
                <?php  
      }
      
            ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- Main footer -->