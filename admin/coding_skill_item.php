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
                    <h1>Coding Skill </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Coding Skill</li>
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
                            <h3 class="card-title">Skills Add</h3>
                        </div>
                        <div class="card-body">

                            <form action="coding_skill_item_post.php" method="post">


                                <!-- <div class="mb-3">
                                    <label for="" class="text-capitalize">Coding Skill Name</label>
                                    <input type="text" name="coding_skill" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_coding_skill'])) {
                                            echo $_SESSION['error_msg_coding_skill'];
                                            unset($_SESSION['error_msg_coding_skill']);
                                        }
                                        ?>
                                    </span>
                                </div> -->
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Skill Caption</label>
                                    <input type="text" name="skill_caption" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_skill_caption'])) {
                                            echo $_SESSION['error_msg_skill_caption'];
                                            unset($_SESSION['error_msg_skill_caption']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Skill Percentage</label>
                                    <input type="text" name="progress_percent" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_skill_progress_percent'])) {
                                            echo $_SESSION['error_msg_skill_progress_percent'];
                                            unset($_SESSION['error_msg_skill_progress_percent']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <button class="btn btn-success" type="submit">Add Skills</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Coding List</h3>
                        </div>
                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <!-- <th>Coding Skills</th> -->
                                        <th>Skills Caption</th>
                                        <th>Skills Percentage</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM coding_skills";
                                    $db_from = mysqli_query($db_conect, $get_query);
                                    $count = 0;

                                    foreach ($db_from as $coding_skill) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <!-- <td><?= $coding_skill['coding_skill'] ?></td> -->
                                            <td><?= $coding_skill['skill_caption'] ?></td>
                                            <td><?= $coding_skill['progress_percent'] ?></td>

                                            <td>
                                                <?php
                                                if ($coding_skill['active_sts'] == 1) :
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
                                                    if ($coding_skill['active_sts'] == 1) :
                                                    ?>
                                                        <a href="coding_skill_item_active.php?coding_skill_id=<?= $coding_skill['id'] ?>" class="btn btn-danger"" class=" btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="coding_skill_item_deactive.php?coding_skill_id=<?= $coding_skill['id'] ?>" class="btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>
                                                    <a href="coding_skill_item_edit.php?coding_skill_id=<?= $coding_skill['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="coding_skill_item_delete.php?coding_skill_id=<?= $coding_skill['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="coding_skill_item_delete.php?coding_skill_id=<?= $coding_skill['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>


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