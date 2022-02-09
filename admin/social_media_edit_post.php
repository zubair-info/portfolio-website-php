<?php
session_start();
require_once('../config.php');
$id = $_POST['id'];
if (isset($_POST['submit'])) {
    $social_url = filter_var($_POST['social_url'], FILTER_SANITIZE_URL);
    // $icon_green_head = filter_var($_POST['icon_green_head'], FILTER_SANITIZE_STRING);
    $social_icon_search = $_POST['social_icon_search'];

    $social_icon = $_POST['social_icon'];


    if (empty($social_url)) {
        $_SESSION['error_msg_social_url'] = "Social Url  Requried";
        header('location: social_media.php');
    } else {
        // echo 'update kora jabe';
        $update_query = "UPDATE `social_medias` SET `social_url`='$social_url',`social_icon_search`='$social_icon_search',`social_icon`='$social_icon' WHERE id=$id";
        mysqli_query($db_conect, $update_query);
        header('location: social_media.php');
        $_SESSION['update_success'] = "Sucessfully Update!!";
    }
}
