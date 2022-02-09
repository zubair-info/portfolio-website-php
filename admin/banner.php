<?php
session_start();
include('inc/admin_header.php');
include('inc/navbar.php');
// include('inc/sidebar.php');
include('../config.php');
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
                    <h1>Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

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
                            <h3 class="card-title">Banner Add Form</h3>
                        </div>
                        <div class="card-body">
                            <form action="banner_post.php" method="post" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner title</label>
                                    <input type="text" name="banner_sub_title" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_sub_title'])) {
                                            echo $_SESSION['banner_sub_title'];
                                            unset($_SESSION['banner_sub_title']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner White title</label>
                                    <input type="text" name="banner_title_one" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_title_one'])) {
                                            echo $_SESSION['banner_title_one'];
                                            unset($_SESSION['banner_title_one']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner Red Title</label>
                                    <input type="text" name="banner_title_two" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_title_two'])) {
                                            echo $_SESSION['banner_title_two'];
                                            unset($_SESSION['banner_title_two']);
                                        }
                                        ?>
                                    </span>
                                </div>



                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner Button</label>
                                    <input type="text" name="banner_detail" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_detail'])) {
                                            echo $_SESSION['banner_detail'];
                                            unset($_SESSION['banner_detail']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_image_error'])) {
                                            echo $_SESSION['banner_image_error'];
                                            unset($_SESSION['banner_image_error']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Add Banner</button>
                            </form>


                        </div>

                    </div>

                </div>



                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Banner List</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body box-body table-responsive no-padding ">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Banner Title</th>
                                        <th>Banner WhiteTitle</th>
                                        <th>Banner Red Title</th>
                                        <th>Banner Button</th>
                                        <th>Banner Image</th>
                                        <th>Banner Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM banners";
                                    $db_from = mysqli_query($db_conect, $get_query);
                                    $count = 0;

                                    foreach ($db_from as $banner) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $banner['banner_sub_title'] ?></td>
                                            <td><?= $banner['banner_title_one'] ?></td>
                                            <td><?= $banner['banner_title_two'] ?></td>
                                            <td><?= $banner['banner_detail'] ?></td>
                                            <td>
                                                <img src="../<?= $banner['image_location'] ?>" alt="" width="150px;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($banner['active_sts'] == 1) :
                                                ?>
                                                    <span class="badge bg-success">active</span>

                                                <?php
                                                else :
                                                ?>
                                                    <span class="badge bg-danger">Deactive</span>


                                                <?php
                                                endif

                                                ?>

                                                <!-- <?= $banner['active_sts'] ?> -->
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <?php
                                                    if ($banner['active_sts'] == 1) :
                                                    ?>
                                                        <a href="banner_active.php?banner_id=<?= $banner['id'] ?>" class="make_active_btn btn btn-danger">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="banner_deactive.php?banner_id=<?= $banner['id'] ?>" class="make_deactive_btn btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>

                                                    <a href="banner_edit.php?banner_id=<?= $banner['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="banner_delete.php?banner_id=<?= $banner['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="banner_delete.php?banner_id=<?= $banner['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


                                                </div>
                                            </td>


                                        </tr>
                                    <?php

                                    }

                                    ?>

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->

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

<?php if (isset($_SESSION['banner_success'])) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?php echo $_SESSION['banner_success'] ?>'
        })
    </script>

<?php endif ?>
<?php unset($_SESSION['banner_success']); ?>