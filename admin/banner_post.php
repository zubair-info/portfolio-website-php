<?php
session_start();

require_once('../config.php');

if (isset($_POST['submit'])) {

    $banner_title_one = filter_var($_POST['banner_title_one'], FILTER_SANITIZE_STRING);
    // $banner_title_one = strtoupper($banner_title_one);
    $banner_title_two = filter_var($_POST['banner_title_two'], FILTER_SANITIZE_STRING);
    // $banner_title_two = strtoupper($banner_title_two);
    $banner_sub_title = filter_var($_POST['banner_sub_title'], FILTER_SANITIZE_STRING);
    // $banner_sub_title = strtoupper($banner_sub_title);
    $banner_detail = filter_var($_POST['banner_detail'], FILTER_SANITIZE_STRING);
    // $banner_title_one = filter_var($_POST['banner_title_one'], FILTER_SANITIZE_STRING);
    $banner_image = $_FILES['banner_image'];


    if (empty($banner_sub_title)) {
        $_SESSION['banner_sub_title'] = "Banner Title One Requried";
        header('location: banner.php');
    } elseif (empty($banner_title_two)) {
        $_SESSION['banner_title_two'] = "Banner Title Two Requried";
        header('location: banner.php');
    } elseif (empty($banner_title_one)) {
        $_SESSION['banner_title_one'] = "Banner Title One Requried";
        header('location: banner.php');
    } elseif (empty($banner_detail)) {
        $_SESSION['banner_detail'] = "Banner Title One Requried";
        header('location: banner.php');
    } elseif ($banner_detail == "") {
        $_SESSION['banner_detail'] = "Banner Title One Requried";
        header('location: banner.php');
    } elseif ($banner_image == "") {
        $_SESSION['banner_image_error'] = "Banner Image Requried";
        header('location: banner.php');
    } else {
        // echo 'update kora jabe';
        $image_orginal_name = $_FILES['banner_image']['name'];
        $image_orginal_size = $_FILES['banner_image']['size'];
        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $insert_query = "INSERT INTO `banners`(`banner_title_one`, `banner_title_two`, `banner_sub_title`, `banner_detail`, `image_location`) VALUES ('$banner_title_one','$banner_title_two','$banner_sub_title','$banner_detail','Primary Location')";
                mysqli_query($db_conect, $insert_query);
                $id_form_db = mysqli_insert_id($db_conect);
                $image_new_name = $id_form_db . "." . $image_extention;
                $save_location = "../uploads/banner/" . $image_new_name;
                move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);
                $image_location = "uploads/banner/" . $image_new_name;
                $update_query = "UPDATE banners SET image_location='$image_location' WHERE id=$id_form_db";
                mysqli_query($db_conect, $update_query);
                $_SESSION['banner_success'] = "Banner Update Sucessfully!!";
                header('location: banner.php');
            } else {
                $_SESSION['banner_image'] = "Image Requried ";
                header('location: banner.php');
            }
        } else {
            $_SESSION['banner_image'] = "Image is too big!! more than 2MB";
            header('location: banner.php');
        }
    }
}
