<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}


// $id = $_GET['portfolio_id'];
if (isset($_GET['portfolio_id'])) {
    $_SESSION['id'] = $_GET['portfolio_id'];
}
$id = $_SESSION['id'];
$get_query = "SELECT * FROM portfolio_one WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
// header('location: guest_message.php');

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Portfolio Editt</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Portfolio Edit</h3>
                        </div>

                        <div class="card-body">
                            <form action="portfolio_item_edit_post.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>" class="form-control">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Heading</label>
                                    <input type="text" name="heading" value="<?= $after_assoc['heading'] ?>" class="form-control">
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
                                    <input type="text" name="sub_head" value="<?= $after_assoc['sub_head'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_sub_head'])) {
                                            echo $_SESSION['error_msg_sub_head'];
                                            unset($_SESSION['error_msg_sub_head']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Image</label>
                                    <input type="file" name="portfolio_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_image'])) {
                                            echo $_SESSION['error_msg_image'];
                                            unset($_SESSION['error_msg_image']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <img src="../<?= $after_assoc['image_location'] ?>" alt="" width="150">
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Update</button>
                            </form>

                        </div>

                    </div>


                </div>

            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



<?php

require_once('inc/admin_footer.php');

?>