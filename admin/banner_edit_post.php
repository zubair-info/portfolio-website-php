<?php
session_start();
require_once('../config.php');
// $id = $_GET['banner_id'];
$id = $_POST['id'];
$banner_title_one = filter_var($_POST['banner_title_one'], FILTER_SANITIZE_STRING);
$banner_title_two = filter_var($_POST['banner_title_two'], FILTER_SANITIZE_STRING);
$banner_sub_title = filter_var($_POST['banner_sub_title'], FILTER_SANITIZE_STRING);
$banner_detail = filter_var($_POST['banner_detail'], FILTER_SANITIZE_STRING);
// $banner_title_one = filter_var($_POST['banner_title_one'], FILTER_SANITIZE_STRING);
$banner_image = $_FILES['banner_image'];
$image_orginal_name = $_FILES['banner_image']['name'];
$image_orginal_size = $_FILES['banner_image']['size'];

if (isset($_POST['submit'])) {

    if (empty($banner_title_one)) {
        $_SESSION['banner_title_one'] = "Banner Title One Requried";
    } elseif (empty($banner_title_two)) {
        $_SESSION['banner_title_two'] = "Banner Title One Requried";
    } elseif (empty($banner_sub_title)) {
        $_SESSION['banner_sub_title'] = "Banner Title One Requried";
    } elseif (empty($banner_detail)) {
        $_SESSION['banner_detail'] = "Banner Title One Requried";
    } else {
        // echo 'update kora jabe';
        // $update_query_banner = "UPDATE `banners` SET `banner_title_one`='$banner_title_one',`banner_title_two`='$banner_title_two',`banner_sub_title`='$banner_sub_title',`banner_detail`='$banner_detail' WHERE id=$id";
        // mysqli_query($db_conect, $update_query_banner);
        // header('location: banner.php');

        if ($_FILES['banner_image']['name']) {


            if ($image_orginal_size <= 2000000) {

                $after_explode = explode('.', $image_orginal_name);
                // print_r($after_explode);
                $image_extention = end($after_explode);
                // print_r($image_extention);
                $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
                if (in_array($image_extention, $allow_extention)) {

                    $get_image_location = "SELECT image_location FROM banners WHERE id=$id";

                    $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                    $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);
                    echo $after_assoc_image_location['image_location'];

                    // unlink('../' . $after_assoc_image_location['image_location']);
                    // $image_new_name = $id . "." . $image_extention;
                    // $save_location = "../uploads/banner/" . $image_new_name;
                    // move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);
                    // $image_location = "uploads/banner/" . $image_new_name;
                    // $update_new_image_query = "UPDATE banners SET image_location='$image_location' WHERE id=$id";
                    // mysqli_query($db_conect, $update_new_image_query);

                    // // print_r($sql);
                    // header('location: banner.php');
                }
            } else {
                $_SESSION['banner_image'] = "Image is too big!! more than 2MB";
            }
        } else {
            $_SESSION['banner_image'] = "Image requried";
        }
    }
}
