<?php
session_start();
require_once('../config.php');
if (isset($_POST['submit'])) {

    $heading = filter_var($_POST['heading'], FILTER_SANITIZE_STRING);
    $sub_head = filter_var($_POST['sub_head'], FILTER_SANITIZE_STRING);
    $portfolio_image = $_FILES['portfolio_image'];
    $image_orginal_name = $_FILES['portfolio_image']['name'];
    $image_orginal_size = $_FILES['portfolio_image']['size'];

    if (empty($heading)) {
        $_SESSION['error_msg_heading'] = "Heading Requried";
        header('location: portfolio_item.php');
    } elseif (empty($sub_head)) {
        $_SESSION['error_msg_sub_head'] = "Sub Head Requried";
        header('location: portfolio_item.php');
    } elseif (empty($portfolio_image)) {
        $_SESSION['error_msg_portfolio_image'] = "Image Requried";
        header('location: portfolio_item.php');
    } else {
        // echo 'update kora jabe';

        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $insert_query = "INSERT INTO `portfolio_one`(`heading`, `sub_head`, `image_location`) VALUES ('$heading','$sub_head','Primary Location')";
                mysqli_query($db_conect, $insert_query);
                $id_form_db = mysqli_insert_id($db_conect);
                $image_new_name = $id_form_db . "." . $image_extention;
                $save_location = "../uploads/portfolio/" . $image_new_name;
                move_uploaded_file($_FILES['portfolio_image']['tmp_name'], $save_location);
                $image_location = "uploads/portfolio/" . $image_new_name;
                $update_query = "UPDATE portfolio_one SET image_location='$image_location' WHERE id=$id_form_db";
                mysqli_query($db_conect, $update_query);
                $_SESSION['update_success'] = "Service Item Update Sucessfully!!";
                header('location: portfolio_item.php');
                // ob_end_flush();
            } else {
                $_SESSION['error_msg_portfolio_image'] = "Image Requried PNG ,JPEG ,JPG ";
            }
        } else {
            $_SESSION['error_msg_portfolio_image'] = "Image is too big!! more than 2MB";
        }
    }
}
