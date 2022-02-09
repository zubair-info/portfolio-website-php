<?php
session_start();
include('inc/admin_header.php');

include('../config.php');
include('navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}

// print_r($_POST);

$login_email = $_SESSION['email'];

$get_query = "SELECT * FROM users WHERE email='$login_email'";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);


if (isset($_POST['submit'])) {

    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($old_password)) {
        $_SESSION['error_msg_old_pass'] = 'Old Password is Required!';
    } else if (empty($password)) {
        $_SESSION['error_msg_pass'] = 'New Password is Required!';
    } else if (empty($confirm_password)) {
        $_SESSION['error_msg_cpass'] = 'Confirm Password is Required!';
    } else {

        $password = $_POST['password'];
        $pass_upper = preg_match('@[A-Z]@', $password);
        $pass_lower = preg_match('@[a-z]@', $password);
        $pass_num = preg_match('@[0-9]@', $password);
        $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        $pass_char = preg_match($pattern, $password);

        if (strlen($password) < 5) {
            $_SESSION['error_msg_pass'] = 'Password should be at least 5 characters!';
            // header('location:index.php');
        } elseif (!$pass_upper == 1) {
            $_SESSION['error_msg_pass'] = "Password must include at least  one upper letter!";
            // header('location:index.php');
        } elseif (!$pass_lower == 1) {
            $_SESSION['error_msg_pass'] = "Password should include at least one lower case letter!";
            // header('location:index.php');
        } elseif (!$pass_num == 1) {
            $_SESSION['error_msg_pass'] = "Password should include at least one number!";
            // header('location:index.php');
        } elseif (!$pass_char == 1) {
            $_SESSION['error_msg_pass'] = "Password should include at least one doller sing!";
            // header('location:index.php');
        } else if ($password !== $confirm_password) {
            $_SESSION['error_msg_cpass'] = "Password Does not match!";
            // header('location:index.php'); 
        } else {

            if ($old_password != $password) {
                $old_pass_encrypt = md5($_POST['old_password']);
                $check_query = "SELECT COUNT(*) AS total_user FROM users WHERE email='$login_email' AND password='$old_pass_encrypt'";
                $db_result = mysqli_query($db_conect, $check_query);
                $after_assocs = mysqli_fetch_assoc($db_result);
                if ($after_assocs['total_user'] == 1) {

                    $new_pass_encrypt = md5($_POST['password']);
                    $confirm_pass_encrypt = md5($_POST['confirm_password']);
                    $update_query = "UPDATE users SET password='$new_pass_encrypt',confirm_password='$confirm_pass_encrypt' WHERE email='$login_email'";
                    mysqli_query($db_conect, $update_query);
                    $_SESSION['success_msg'] = "Password Change Sucesfully!";
                    header('location:profile.php');
                } else {
                    $_SESSION['error_msg_old_pass'] = 'Old Password Did Not Match!';
                }
            } else {
                $_SESSION['error_msg_pass'] = 'Old Password And New Passwor Same Try Again!!';
            }
        }
    }
}



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
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

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center title text-capitalize"><?= $after_assoc['first_name'] ?> <?= $after_assoc['last_name'] ?></h3>

                            <p class="text-muted text-center">Software Engineer</p>
                            <p class="text-muted text-center"><?= $after_assoc['email'] ?></p>
                            <p class="text-muted text-center"><?= $after_assoc['address'] ?></p>


                            <!-- <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                        </ul> -->

                            <a href="#" class="btn btn-primary btn-block"><b>Profile </b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Password Change</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <form action=" " method="POST">

                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <label for="old_password">Old Password<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">

                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_old_pass'])) {
                                                    echo $_SESSION['error_msg_old_pass'];
                                                    unset($_SESSION['error_msg_old_pass']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="password">New Password<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="New Password">

                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_pass'])) {
                                                    echo $_SESSION['error_msg_pass'];
                                                    unset($_SESSION['error_msg_pass']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="confirm_password">Confirm Password<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_cpass'])) {
                                                    echo $_SESSION['error_msg_cpass'];
                                                    unset($_SESSION['error_msg_cpass']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="d-grid gap-2">
                                        <input type="submit" name="submit" class="btn btn-warning" value="UPDATE PASSWORD">
                                    </div>

                                </div>


                            </form>

                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php
include('inc/admin_footer.php');

?>