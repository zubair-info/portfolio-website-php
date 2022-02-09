<?php
session_start();
require_once('../config.php');
// print_r($_POST);
$id = $_POST['id'];

// $coding_skill = filter_var($_POST['coding_skill'], FILTER_SANITIZE_STRING);
$social_icon_search = filter_var($_POST['social_icon_search'], FILTER_SANITIZE_STRING);
$heading = filter_var($_POST['heading'], FILTER_SANITIZE_STRING);
$sub_heading = filter_var($_POST['sub_heading'], FILTER_SANITIZE_STRING);
$detail = filter_var($_POST['detail'], FILTER_SANITIZE_STRING);


if (empty($social_icon_search)) {
    $_SESSION['error_msg_social_icon_search'] = "Icon Requried";
    header('location: service.php');
} elseif (empty($heading)) {
    $_SESSION['error_msg_heading'] = "Heading Requried";
    header('location: service.php');
} elseif (empty($sub_heading)) {
    $_SESSION['error_msg_sub_heaing'] = "Sub Heading  Requried";
    header('location: service.php');
} else {
    // echo 'update kora jabe';
    $update_query = "UPDATE `services` SET `social_icon_search`='$social_icon_search',`heading`='$heading',`sub_heading`='$sub_heading' WHERE id=$id";
    mysqli_query($db_conect, $update_query);
    header('location: service.php');
    $_SESSION['update_success'] = "service Update Sucessfully!!";
}
