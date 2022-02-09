<?php
session_start();
require_once('../config.php');

if (isset($_POST['submit'])) {
    // $id = $_GET['id'];

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $name = strtoupper($name);
    $degination = filter_var($_POST['degination'], FILTER_SANITIZE_STRING);
    $degination = strtoupper($degination);
    $detail = filter_var($_POST['detail'], FILTER_SANITIZE_STRING);

    $testimonial_image = $_FILES['testimonial_image'];
    // print_r($service_image);
    // die();
    $image_orginal_name = $_FILES['testimonial_image']['name'];
    $image_orginal_size = $_FILES['testimonial_image']['size'];

    if (empty($name)) {
        $_SESSION['error_msg_name'] = "Testimonial  Name  Requried";
        header('location: testimonial_item.php');
    } elseif (empty($degination)) {
        $_SESSION['error_msg_degination'] = "Testimonial Degination Requried";
        header('location: testimonial_item.php');
    } elseif (empty($detail)) {
        $_SESSION['error_msg_detail'] = "Testimonial detail Requried";
        header('location: testimonial_item.php');
    } else {
        // echo 'update kora jabe';

        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $insert_query = "INSERT INTO `testimonial_items`( `name`, `degination`, `detail`, `image_location`) VALUES ('$name','$degination','$detail','Primary Location')";
                mysqli_query($db_conect, $insert_query);
                $id_form_db = mysqli_insert_id($db_conect);
                $image_new_name = $id_form_db . "." . $image_extention;
                $save_location = "../uploads/testimonial/" . $image_new_name;
                move_uploaded_file($_FILES['testimonial_image']['tmp_name'], $save_location);
                $image_location = "uploads/testimonial/" . $image_new_name;
                $update_query = "UPDATE testimonial_items SET image_location='$image_location' WHERE id=$id_form_db";
                mysqli_query($db_conect, $update_query);
                // $_SESSION['testimonial_success']="Testimonal Update Sucessfully!!";
                $_SESSION['update_success'] = "Testimonal Update Sucessfully!!";

                header('location: testimonial_item.php');
            } else {
                $_SESSION['error_msg_image'] = "Image Requried";
                header('location: testimonial_item.php');
            }
        } else {
            $_SESSION['error_msg_image'] = "Image is too big!! more than 2MB";
            header('location: testimonial_item.php');
        }
    }
}
