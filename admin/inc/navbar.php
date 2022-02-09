<?php
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}

$login_email = $_SESSION['email'];
$get_query = "SELECT * FROM users WHERE email='$login_email'";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc_user = mysqli_fetch_assoc($db_from);
// print_r($after_assoc);
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
            <!-- <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a> -->
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown user user-menu">
            <div class="user-panel pb-3  d-flex dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <div class="image">
                    <img src="../<?= $after_assoc_user['image_location'] ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="profile.php" class="d-block text-capitalize"><?php echo $after_assoc_user['first_name'] ?> <?php echo $after_assoc_user['last_name'] ?> </a>
                </div>
            </div>
            <ul class="dropdown-menu">

                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username text-capitalize"><?php echo $after_assoc_user['first_name'] ?> <?php echo $after_assoc_user['last_name'] ?></h3>
                        <h5 class="widget-user-desc text-capitalize"><?php echo $after_assoc_user['address'] ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="../<?= $after_assoc_user['image_location'] ?>" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">

                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <a href="profile.php" class="btn btn-success">Profile</a>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="description-block">
                                    <a href="../logout.php" class="btn btn-danger">Logout</a>

                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </ul>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" target="_blank" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PORTFOLIO WEBSITE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../<?= $after_assoc_user['image_location'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile.php" class="d-block text-capitalize"><?php echo $after_assoc_user['first_name'] ?> <?php echo $after_assoc_user['last_name'] ?> </a>
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
                            <?php
                            $get_msg_notfication_query = "SELECT COUNT(*) AS user_count FROM users ";
                            $from_db = mysqli_query($db_conect, $get_msg_notfication_query);
                            $after_assoc = mysqli_fetch_assoc($from_db);
                            ?>

                            <span class="right badge badge-danger"><?= $after_assoc['user_count'] ?></span>



                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="guest_message.php" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        Guest Message
                        <p>
                            <?php
                            // require_once('../config.php');
                            $get_msg_notfication_query = "SELECT COUNT(*) AS message_notification FROM guest_messages WHERE read_sts=1";
                            $from_db = mysqli_query($db_conect, $get_msg_notfication_query);
                            $after_assoc = mysqli_fetch_assoc($from_db);
                            ?>
                            <span class="badge rounded-pill bg-warning ms-4">
                                <?= $after_assoc['message_notification'] ?></span>
                            <!-- Guest Message
                                <span class="right badge badge-warning">4</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="banner.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Banner
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            About
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <!-- service start -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-servicestack"></i>
                        <p>
                            My Skills
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="coding_skill_item.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Coding Skill</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="design_skill_item.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Design Skill</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- service Ends -->


                <li class="nav-item">
                    <a href="education.php" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Education
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="experience.php" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Experience
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="service.php" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Service
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="testimonial_item.php" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Testimonal
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>


                <!-- Funfact start -->
                <li class="nav-item">
                    <a href="funfact_item.php" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Funfact
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>


                <!-- Funfact End -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-servicestack"></i>
                        <p>
                            Portfolio
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="portfolio_item.php" class="nav-link">
                                <?php
                                $get_query = "SELECT * FROM portfolio_head_one WHERE active_sts=2";
                                $db_from = mysqli_query($db_conect, $get_query);
                                $after_assoc = mysqli_fetch_assoc($db_from);
                                ?>
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p class="text-capitalize"><?= $after_assoc['portfolio_head'] ?></p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="design_skill_item.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Design Skill</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item">
                    <a href="social_media.php" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Social Setting

                        </p>
                    </a>
                </li>




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
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>