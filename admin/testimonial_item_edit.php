<?php
session_start();
require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}

if (isset($_GET['testimonial_id'])) {
    $_SESSION['id'] = $_GET['testimonial_id'];
}
$id = $_SESSION['id'];
// $id=$_SESSION['']

$get_query = "SELECT * FROM testimonial_items WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);


// print_r($after_assoc);
// header('location: guest_message.php');

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
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
                            <h3 class="cadr-title text-capitalize">Testimonal Item Edit From</h3>

                        </div>
                        <div class="card-body">

                            <form action="testimonial_item_edit_post.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>" class="form-control">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Item name</label>
                                    <input type="text" name="name" value="<?= $after_assoc['name'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_name'])) {
                                            echo $_SESSION['error_msg_name'];
                                            unset($_SESSION['error_msg_name']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Item Degination</label>
                                    <input type="text" name="degination" value="<?= $after_assoc['degination'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_degination'])) {
                                            echo $_SESSION['error_msg_degination'];
                                            unset($_SESSION['error_msg_degination']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Item Details</label>
                                    <!-- <input type="text" name="service_detail" class="form-control"> -->
                                    <textarea type="text" class="form-control" id="detail" name="detail" rows="4" cols="50"><?= $after_assoc['detail'] ?></textarea>
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_detail'])) {
                                            echo $_SESSION['error_msg_detail'];
                                            unset($_SESSION['error_msg_detail']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Image</label>
                                    <input type="file" name="testimonial_image" class="form-control">
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

                                <button class="btn btn-success" name="submit" type="submit">Update Items</button>
                            </form>

                        </div>
                    </div>


                </div>
                <!-- /.col -->

            </div>
            <!-- /.card -->
        </div>
    </section> <!-- /.col -->
</div>

<?php

require_once('inc/admin_footer.php');

?>