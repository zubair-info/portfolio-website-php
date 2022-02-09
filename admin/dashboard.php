<?php
session_start();
include('inc/admin_header.php');
include('inc/navbar.php');
// include('inc/sidebar.php');
include('../config.php');

if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <h5 class="mb-2">Info Box</h5>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-danger">
                        <?php
                        $get_msg_notfication_query = "SELECT COUNT(*) AS user_count FROM users ";
                        $from_db = mysqli_query($db_conect, $get_msg_notfication_query);
                        $after_assoc = mysqli_fetch_assoc($from_db);
                        ?>
                        <div class="inner">
                            <h3><?= $after_assoc['user_count'] ?></h3>

                            <p>New Users</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-user"></i>
                        </div>
                        <a href="user_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-info">
                        <?php
                        // include('../config.php');
                        $get_msg_notfication_query = "SELECT COUNT(*) AS message_notification FROM guest_messages";
                        $from_db = mysqli_query($db_conect, $get_msg_notfication_query);
                        $after_assoc = mysqli_fetch_assoc($from_db);
                        ?>
                        <div class="inner">
                            <h3><?= $after_assoc['message_notification'] ?></h3>

                            <p>Guest Message</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <a href="guest_message.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- small box -->

                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-warning">
                        <?php
                        // include('../config.php');
                        $get_msg_notfication_query = "SELECT COUNT(*) AS message_notification FROM guest_messages WHERE read_sts=1";
                        $from_db = mysqli_query($db_conect, $get_msg_notfication_query);
                        $after_assoc_unread = mysqli_fetch_assoc($from_db);
                        ?>
                        <div class="inner">
                            <h3><?= $after_assoc_unread['message_notification'] ?></h3>

                            <p>Unread Message</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <a href="guest_message.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-info">
                        <?php
                        $get_msg_notfication_query = "SELECT COUNT(*) AS message_notification FROM guest_messages WHERE read_sts=2";
                        $from_db = mysqli_query($db_conect, $get_msg_notfication_query);
                        $after_assoc_read = mysqli_fetch_assoc($from_db);
                        ?>
                        <div class="inner">
                            <h3><?= $after_assoc_read['message_notification'] ?></h3>

                            <p>Read Message</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <a href="guest_message.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- small box -->

                </div>

            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


</div>
<?php
include('inc/admin_footer.php');
?>