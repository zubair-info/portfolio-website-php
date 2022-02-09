<?php
session_start();
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
// require_once('inc/sidebar.php');
require_once('../config.php');
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
                    <h1>experience </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">experience</li>
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
                            <h3 class="card-title">Experience Add</h3>
                        </div>
                        <div class="card-body">

                            <form action="experience_post.php" method="post">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Title</label>
                                    <input type="text" name="title" class="form-control">
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
                                    <input type="text" name="heading" class="form-control">
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
                                    <input type="text" name="sub_heading" class="form-control">
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
                                    <input type="text" name="detail" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_detail'])) {
                                            echo $_SESSION['error_msg_detail'];
                                            unset($_SESSION['error_msg_detail']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" type="submit">Add experience</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">experience List</h3>
                        </div>
                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Heading</th>
                                        <th>Sub Heading</th>
                                        <th>Deatils</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM experiences";
                                    $db_from = mysqli_query($db_conect, $get_query);
                                    $count = 0;

                                    foreach ($db_from as $experience) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $experience['title'] ?></td>
                                            <td><?= $experience['heading'] ?></td>
                                            <td><?= $experience['sub_heading'] ?></td>
                                            <td><?= $experience['detail'] ?></td>
                                            <td>
                                                <?php
                                                if ($experience['active_sts'] == 1) :
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
                                                    if ($experience['active_sts'] == 1) :
                                                    ?>
                                                        <a href="experience_active.php?experience_id=<?= $experience['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="experience_deactive.php?experience_id=<?= $experience['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>
                                                    <a href="experience_edit.php?experience_id=<?= $experience['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="experience_item_delete.php?experience_id=<?= $experience['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="experience_delete.php?experience_id=<?= $experience['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


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
    </section>
    <!-- /.col -->
</div>





<?php
require_once('inc/admin_footer.php');

?>