<?php
session_start();
require_once('../config.php');
// print_r($_POST);

// $coding_skill = filter_var($_POST['coding_skill'], FILTER_SANITIZE_STRING);
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$heading = filter_var($_POST['heading'], FILTER_SANITIZE_STRING);
$sub_heading = filter_var($_POST['sub_heading'], FILTER_SANITIZE_STRING);
$detail = filter_var($_POST['detail'], FILTER_SANITIZE_STRING);


if (empty($title)) {
    $_SESSION['error_msg_title'] = "Title Requried";
    header('location: education.php');
} elseif (empty($heading)) {
    $_SESSION['error_msg_heading'] = "Heading Requried";
    header('location: education.php');
} elseif (empty($sub_heading)) {
    $_SESSION['error_msg_sub_heaing'] = "Sub Heading  Requried";
    header('location: education.php');
} elseif (empty($detail)) {
    $_SESSION['error_msg_detail'] = "Detail  Requried";
    header('location: education.php');
} else {
    // echo 'update kora jabe';
    $insert_query = "INSERT INTO `educations`(`title`, `heading`, `sub_heading`, `detail`) VALUES ('$title','$heading','$sub_heading','$detail')";
    mysqli_query($db_conect, $insert_query);
    header('location: education.php');
    $_SESSION['update_success'] = "Education Update Sucessfully!!";
}
