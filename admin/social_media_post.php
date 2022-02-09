<?php
session_start();
require_once('../config.php');




$social_url = filter_var($_POST['social_url'], FILTER_SANITIZE_URL);
// $icon_green_head = filter_var($_POST['icon_green_head'], FILTER_SANITIZE_STRING);
$social_icon_search = $_POST['social_icon_search'];

$social_icon = $_POST['social_icon'];


if (empty($social_url)) {
    $_SESSION['error_msg_social_url'] = "Social Url  Requried";
    header('location: social_media.php');
}
// elseif (empty($social_icon)) {
//     $_SESSION['error_msg_social_icon'] = "Social Icon  Requried";
//     header('location: social_media.php');
// } 
else {
    $insert_query = "INSERT INTO `social_medias`(`social_url`,`social_icon`,`social_icon_search`) VALUES ('$social_url','$social_icon','$social_icon_search')";
    mysqli_query($db_conect, $insert_query);
    header('location: social_media.php');
    $_SESSION['update_success'] = "Sucessfully Update!!";
    // echo 'done';;
}
