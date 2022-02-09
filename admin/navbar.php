<?php
// session_start();
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}

$login_email = $_SESSION['email'];
$get_query = "SELECT * FROM users WHERE email='$login_email'";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
    </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
        </button>
        </div>
    </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['email'] ?>


            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <li><a class="dropdown-item text-success" href="profile.php">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-warning" href="password_change.php">Change Password</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-danger" href="../logout.php">Logout</a></li>
            </div>
        </div>
        <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
        </a>
    </li> -->
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PortFolio</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile.php" class="d-block text-capitalize"><?= $after_assoc['first_name'] ?> <?= $after_assoc['last_name'] ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="dashboard.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="user_list.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User List
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="message_head.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Meaasge Head

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="guest_message.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        Guest Message
                        <p>
                            <?php
                            // require_once('../config.php');
                            $get_msg_notfication_query = "SELECT COUNT(*) AS message_notification FROM guest_messages WHERE read_sts=1";
                            $from_db = mysqli_query($db_conect, $get_msg_notfication_query);
                            $after_assoc = mysqli_fetch_assoc($from_db);
                            ?>
                            <span class="badge rounded-pill bg-warning ms-4">
                                <?= $after_assoc['message_notification'] ?>
                                <!-- Guest Message
                                <span class="right badge badge-warning">4</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="banner.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Banner
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <!-- service start -->
                <li class="nav-item">
                    <a href="service.php" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Service
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="service.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service Head</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="service_item.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service Item</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- service Ends -->

                <!-- Funfact start -->

                <li class="nav-item">
                    <a href="funfact.php" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Funfact
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="funfact.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Funfact head</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="funfact_item.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Funfact Item</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Funfact End -->


                <!-- PROFILE start -->

                <li class="nav-header">PROFILE</li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Profile Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="password_change.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>

                </li>
            </ul>

            <li class="nav-item">
                <a href="brand.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Brand
                        <!-- <span class="right badge badge-danger">New</span> -->
                    </p>
                </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>