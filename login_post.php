<?php
session_start();
include('config.php');
// print_r($_POST);


$email = $_POST['email'];
$password = $_POST['password'];

$password_encypt = md5($_POST['password']);

if (empty($email)) {
    $_SESSION['error_msg_email'] = 'Email is Required!';
    header('location:login.php');
} elseif (empty($password)) {
    $_SESSION['error_msg_pass'] = 'Password is Required!';
    header('location:login.php');
} else {

    $check_query = "SELECT COUNT(*) AS total_user FROM users WHERE email='$email' AND password='$password_encypt' ";

    $db_form = mysqli_query($db_conect, $check_query);
    // print_r($db_form);

    $after_assoc = mysqli_fetch_assoc($db_form);

    // print_r($after_assoc);

    if ($after_assoc['total_user'] == 1) {

        $_SESSION['email'] = $email;
        $_SESSION['user_status'] = 'yes';

        header('location: admin/dashboard.php');
    } else {
        // echo 'login kora jabe na';
        $_SESSION['login_error'] = 'Your Email and Password are Invalid';
        header('location:login.php');
    }
}
