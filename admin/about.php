<?php
session_start();
include('inc/admin_header.php');
include('inc/navbar.php');

if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About</h1>
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
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-capitalize"> Add From</h3>
                        </div>

                        <div class="card-body">

                            <form action="about_Post.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">name</label>
                                    <input type="text" name="name" value="<?= isset($_POST['submit']) ? $_SESSION['name'] : "" ?>" class="form-control">
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
                                    <input type="text" name="designation" class="form-control">
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
                                    <textarea type="text" class="form-control" id="detail" name="detail" rows="4" cols="50"></textarea>
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
                                    <input type="text" name="from" class="form-control">
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
                                    <input type="text" name="live_in" class="form-control">
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
                                    <input type="text" name="age" class="form-control">
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
                                            <input class="form-check-input" type="radio" value="Male" name="gender">
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="Female" name="gender" checked="">
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
                                    <input type="text" name="button" class="form-control">
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
                                    <input type="url" name="button_link" class="form-control">
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

                                <button class="btn btn-success" name="submit" type="submit">Add Items</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-capitalize">All Form List</h3>
                        </div>

                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Degination</th>
                                        <th>Details</th>
                                        <th>From</th>
                                        <th>Live In</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Button</th>
                                        <th>Button Link</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM abouts";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $about) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $about['name'] ?></td>
                                            <td><?= $about['designation'] ?></td>
                                            <td><?= $about['detail'] ?></td>
                                            <td><?= $about['from'] ?></td>
                                            <td><?= $about['live_in'] ?></td>
                                            <td><?= $about['age'] ?></td>
                                            <td><?= $about['gender'] ?></td>
                                            <td><?= $about['button'] ?></td>
                                            <td><?= $about['button_link'] ?></td>

                                            <td>
                                                <img src="../<?= $about['image_location'] ?>" alt="" width="150px;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($about['active_sts'] == 1) :
                                                ?>
                                                    <span class="badge bg-success">active</span>

                                                <?php
                                                else :
                                                ?>
                                                    <span class="badge bg-danger">Deactive</span>


                                                <?php
                                                endif

                                                ?>

                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <?php
                                                    if ($about['active_sts'] == 1) :
                                                    ?>
                                                        <a href="about_item_active.php?about_id=<?= $about['id'] ?>" class="btn btn-danger"" class=" make_active_btn btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="about_item_deactive.php?about_id=<?= $about['id'] ?>" class="make_deactive_btn btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>

                                                    <a href="about_item_edit.php?about_id=<?= $about['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="about_item_delete.php?about_id=<?= $about['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="about_item_delete.php?about_id=<?= $about['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>



                                                </div>
                                            </td>

                                        </tr>
                                    <?php

                                    }

                                    ?>

                                </tbody>


                            </table>

                        </div>


                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section> <!-- /.col -->
</div>


<?php
include('inc/admin_footer.php');
?>