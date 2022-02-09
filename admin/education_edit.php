<?php
session_start();
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
// require_once('inc/sidebar.php');
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}

// $id = $_GET['education_id'];
if (isset($_GET['education_id'])) {
    $_SESSION['id'] = $_GET['education_id'];
}
$id = $_SESSION['id'];

$get_query = "SELECT * FROM educations WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Education </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Education</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Education Edit</h3>
                        </div>
                        <div class="card-body">

                            <form action="education_edit_post.php" method="post">
                                <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Title</label>
                                    <input type="text" name="title" value="<?= $after_assoc['title'] ?> " class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_title'])) {
                                            echo $_SESSION['error_msg_title'];
                                            unset($_SESSION['error_msg_title']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Heading</label>
                                    <input type="text" name="heading" value="<?= $after_assoc['heading'] ?> " class=" form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_heading'])) {
                                            echo $_SESSION['error_msg_heading'];
                                            unset($_SESSION['error_msg_heading']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Sub Heading</label>
                                    <input type="text" name="sub_heading" value="<?= $after_assoc['sub_heading'] ?>" class=" form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_sub_heading'])) {
                                            echo $_SESSION['error_msg_sub_heading'];
                                            unset($_SESSION['error_msg_sub_heading']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Detail</label>
                                    <input type="text" name="detail" value="<?= $after_assoc['detail'] ?>" class=" form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_detail'])) {
                                            echo $_SESSION['error_msg_detail'];
                                            unset($_SESSION['error_msg_detail']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" type="submit">Update Education</button>
                            </form>

                        </div>

                    </div>


                </div>

            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.col -->
</div>





<?php
require_once('inc/admin_footer.php');

?>