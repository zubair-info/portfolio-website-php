<?php
session_start();
require_once('../config.php');
// print_r($_POST);

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
    $insert_query = "INSERT INTO `services`(`social_icon_search`, `heading`, `sub_heading`) VALUES ('$social_icon_search','$heading','$sub_heading')";
    mysqli_query($db_conect, $insert_query);
    header('location: service.php');
    $_SESSION['update_success'] = "service Update Sucessfully!!";
}
