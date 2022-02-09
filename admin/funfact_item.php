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
                    <h1>Funfact </h1>
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
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Funfact add</h3>
                        </div>
                        <div class="card-body">

                            <form action="funfact__item_post.php" method="post" enctype="multipart/form-data">


                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Funfact Counter Number</label>
                                    <input type="text" name="funfact_counter" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_funfact_counter'])) {
                                            echo $_SESSION['error_msg_funfact_counter'];
                                            unset($_SESSION['error_msg_funfact_counter']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Funfact White Heading</label>
                                    <input type="text" name="white_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_white_head'])) {
                                            echo $_SESSION['error_msg_white_head'];
                                            unset($_SESSION['error_msg_white_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <button class="btn btn-success" type="submit">Add Item</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Funfact List</h3>
                        </div>
                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Funfact Counter Number</th>
                                        <th>White Heading</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM funfact_items";
                                    $db_from = mysqli_query($db_conect, $get_query);
                                    $count = 0;

                                    foreach ($db_from as $funfact) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $funfact['funfact_counter'] ?></td>
                                            <td><?= $funfact['white_head'] ?></td>
                                            <td>
                                                <?php
                                                if ($funfact['active_sts'] == 1) :
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
                                                    if ($funfact['active_sts'] == 1) :
                                                    ?>
                                                        <a href="funfact_item_active.php?funfact_id=<?= $funfact['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="funfact_item_deactive.php?funfact_id=<?= $funfact['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>
                                                    <a href="funfact_item_edit.php?funfact_id=<?= $funfact['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="funfact_item_delete.php?funfact_id=<?= $funfact['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="funfact_item_delete.php?funfact_id=<?= $funfact['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


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