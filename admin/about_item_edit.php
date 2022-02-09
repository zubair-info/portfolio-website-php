<?php
session_start();
// ob_start();
include('inc/admin_header.php');
include('inc/navbar.php');
// include('inc/sidebar.php');
include('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}

if (isset($_GET['about_id'])) {
    $_SESSION['id'] = $_GET['about_id'];
}
$id = $_SESSION['id'];

// $id = $_GET['about_id'];
$get_query = "SELECT * FROM abouts WHERE id=$id";
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
                    <h1>About Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">About</li>
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
                            <h3 class="card-title">About Edit</h3>
                        </div>
                        <div class="card-body">
                            <form action="about_edit_post.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">name</label>
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
                                    <label for="" class="text-capitalize">Degination</label>
                                    <input type="text" name="designation" value="<?= $after_assoc['designation'] ?>" class="form-control">
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
                                    <label for="" class="text-capitalize">Details</label>
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
                                    <label for="" class="text-capitalize">From </label>
                                    <input type="text" name="from" value="<?= $after_assoc['from'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_from'])) {
                                            echo $_SESSION['error_msg_from'];
                                            unset($_SESSION['error_msg_from']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Lives in</label>
                                    <input type="text" name="live_in" value="<?= $after_assoc['live_in'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_live_in'])) {
                                            echo $_SESSION['error_msg_live_in'];
                                            unset($_SESSION['error_msg_live_in']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Age</label>
                                    <input type="text" name="age" value="<?= $after_assoc['age'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_age'])) {
                                            echo $_SESSION['error_msg_age'];
                                            unset($_SESSION['error_msg_age']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Gender</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" <?= ($after_assoc['gender'] == "Male") ? "checked" : "" ?> value="Male" name="gender">
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" <?= ($after_assoc['gender'] == "Female") ? "checked" : "" ?> value="Female" name="gender" checked="">
                                            <label class="form-check-label">Female</label>
                                        </div>

                                    </div>
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_gender'])) {
                                            echo $_SESSION['error_msg_gender'];
                                            unset($_SESSION['error_msg_gender']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">button</label>
                                    <input type="text" name="button" value="<?= $after_assoc['button'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_button'])) {
                                            echo $_SESSION['error_msg_button'];
                                            unset($_SESSION['error_msg_button']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">button link</label>
                                    <input type="url" name="button_link" value="<?= $after_assoc['button_link'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_button_link'])) {
                                            echo $_SESSION['error_msg_button_link'];
                                            unset($_SESSION['error_msg_button_link']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Image</label>
                                    <input type="file" name="about_image" class="form-control">
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

                                <button class="btn btn-success" name="submit" type="submit">Add Items</button>
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
include('inc/admin_footer.php');

?>