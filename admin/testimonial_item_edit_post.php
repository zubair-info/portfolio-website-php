<?php
session_start();
require_once('../config.php');
$id = $_POST['id'];
// die();
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$name = strtoupper($name);
$degination = filter_var($_POST['degination'], FILTER_SANITIZE_STRING);
$degination = strtoupper($degination);
$detail = filter_var($_POST['detail'], FILTER_SANITIZE_STRING);

$testimonial_image = $_FILES['testimonial_image'];
// print_r($service_image);
// die();

if (empty($name)) {
    $_SESSION['error_msg_name'] = "Testimonial  Name  Requried";
    header('location: testimonial_item_edit.php');
} elseif (empty($degination)) {
    $_SESSION['error_msg_degination'] = "Testimonial Degination Requried";
    header('location: testimonial_item_edit.php');
} elseif (empty($detail)) {
    $_SESSION['error_msg_detail'] = "Testimonial detail Requried";
    header('location: testimonial_item_edit.php');
} else {
    // echo 'update kora jabe';
    $update_query = "UPDATE `testimonial_items` SET `name`='$name',`degination`='$degination',`detail`='$detail' WHERE  id=$id";
    mysqli_query($db_conect, $update_query);
    header('location: testimonial_item.php');

    $image_orginal_name = $_FILES['testimonial_image']['name'];
    $image_orginal_size = $_FILES['testimonial_image']['size'];

    if ($_FILES['testimonial_image']['name']) {


        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $get_image_location = "SELECT image_location FROM testimonial_items WHERE id=$id";

                $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);

                // print_r($after_assoc_image_location);
                // echo $after_assoc_image_location['image_location'];

                unlink('../' . $after_assoc_image_location['image_location']);
                $image_new_name = $id . "." . $image_extention;
                $save_location = "../uploads/testimonial/" . $image_new_name;
                move_uploaded_file($_FILES['testimonial_image']['tmp_name'], $save_location);
                $image_location = "uploads/testimonial/" . $image_new_name;
                $update_new_image_query = "UPDATE testimonial_items SET image_location='$image_location' WHERE id=$id";
                mysqli_query($db_conect, $update_new_image_query);
                header('location: testimonial_item.php');
            }
        } else {
            $_SESSION['error_msg_image'] = "Image is too big!! more than 2MB";
            header('location: testimonial_item_edit.php');
        }
    }
}
