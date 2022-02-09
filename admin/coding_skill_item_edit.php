<?php
session_start();
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
// require_once('inc/sidebar.php');
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}
$id = $_GET['coding_skill_id'];

$get_query = "SELECT * FROM coding_skills WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);

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

                            <form action="coding_skill_item_edit_post.php" method="post">
                                <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">


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
                                    <input type="text" name="skill_caption" value="<?= $after_assoc['skill_caption'] ?>" class="form-control">
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
                                    <input type="text" name="progress_percent" value="<?= $after_assoc['progress_percent'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_skill_progress_percent'])) {
                                            echo $_SESSION['error_msg_skill_progress_percent'];
                                            unset($_SESSION['error_msg_skill_progress_percent']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <button class="btn btn-success" type="submit">Update Skills</button>
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