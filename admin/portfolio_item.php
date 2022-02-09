<?php
session_start();
ob_start();

require_once('../config.php');
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
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
                    <h1>portfolio Item</h1>
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
                            <h3 class="card-title">Portfolio Head</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_POST['submit_one'])) {
                                $portfolio_head = filter_var($_POST['portfolio_head'], FILTER_SANITIZE_STRING);
                                if (empty($portfolio_head)) {
                                    $_SESSION['error_msg_head'] = "Heading Requried";
                                    // header('location: portfolio_item.php');
                                } else {
                                    $inesrt_query = "INSERT INTO `portfolio_head_one`( `portfolio_head`) VALUES ('$portfolio_head')";
                                    mysqli_query($db_conect, $inesrt_query);
                                    // header('location: portfolio_item.php');
                                }
                            }
                            ?>
                            <form action=" " method="post">
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Heading</label>
                                    <input type="text" name="portfolio_head" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_head'])) {
                                            echo $_SESSION['error_msg_head'];
                                            unset($_SESSION['error_msg_head']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <button class="btn btn-success" name="submit_one" type="submit">Add </button>

                            </form>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">portfolio Item</h3>
                        </div>
                        <div class="card-body">


                            <form action="portfolio_item_post.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">portfolio Item Heading</label>
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
                                    <label for="" class="text-capitalize">portfolio sub Heading</label>
                                    <!-- <input type="text" name="portfolio_detail" class="form-control"> -->
                                    <input type="text" name="sub_head" class="form-control">
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
                                    <label for="" class="text-capitalize">portfolio Image</label>
                                    <input type="file" name="portfolio_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_portfolio_image'])) {
                                            echo $_SESSION['error_msg_portfolio_image'];
                                            unset($_SESSION['error_msg_portfolio_image']);
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
                            <h3 class="card-title">portfolio Item List </h3>
                        </div>
                        <div class="card-body box-body table-responsive no-paddings">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Heading</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM portfolio_head_one";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $portfolio_head) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $portfolio_head['portfolio_head'] ?></td>
                                            <!-- <td><?= $portfolio_head['sub_head'] ?></td> -->

                                            <td>
                                                <?php
                                                if ($portfolio_head['active_sts'] == 1) :
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
                                                    if ($portfolio_head['active_sts'] == 1) :
                                                    ?>
                                                        <a href="portfolio_head_one_active.php?portfolio_id=<?= $portfolio_head['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="portfolio_head_one_deactive.php?portfolio_id=<?= $portfolio_head['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>

                                                    <!-- <a href="portfolio_item_edit.php?portfolio_id=<?= $portfolio_head['id'] ?>" class="btn btn-warning">Edit</a> -->
                                                    <!-- <a href="portfolio_item_delete.php?portfolio_id=<?= $portfolio['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="portfolio_head_one_delete.php?portfolio_id=<?= $portfolio_head['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


                                                </div>
                                            </td>

                                        </tr>
                                    <?php

                                    }

                                    ?>

                                </tbody>


                            </table>

                        </div>
                        <div class="card-header">
                            <h3 class="card-title">portfolio Item List </h3>
                        </div>
                        <div class="card-body box-body table-responsive no-paddings">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Item Heading</th>
                                        <th>Item Details</th>
                                        <th>Item Image</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM portfolio_one";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $portfolio) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $portfolio['heading'] ?></td>
                                            <td><?= $portfolio['sub_head'] ?></td>
                                            <td>
                                                <img src="../<?= $portfolio['image_location'] ?>" alt="" width="150px;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($portfolio['active_sts'] == 1) :
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
                                                    if ($portfolio['active_sts'] == 1) :
                                                    ?>
                                                        <a href="portfolio_item_active.php?portfolio_id=<?= $portfolio['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="portfolio_item_deactive.php?portfolio_id=<?= $portfolio['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>

                                                    <a href="portfolio_item_edit.php?portfolio_id=<?= $portfolio['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="portfolio_item_delete.php?portfolio_id=<?= $portfolio['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="portfolio_item_delete.php?portfolio_id=<?= $portfolio['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


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
                </div>
                <!-- /.card-body -->
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