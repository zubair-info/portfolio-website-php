<?php
session_start();
require_once('../config.php');
$id = $_POST['id'];

if (isset($_POST['submit'])) {

    $heading = filter_var($_POST['heading'], FILTER_SANITIZE_STRING);
    $sub_head = filter_var($_POST['sub_head'], FILTER_SANITIZE_STRING);
    $portfolio_image = $_FILES['portfolio_image'];
    $image_orginal_name = $_FILES['portfolio_image']['name'];
    $image_orginal_size = $_FILES['portfolio_image']['size'];

    if (empty($heading)) {
        $_SESSION['error_msg_heading'] = "Heading Requried";
        header('location: portfolio_item_edit.php');
    } elseif (empty($sub_head)) {
        $_SESSION['error_msg_sub_head'] = "Sub Head Requried";
        header('location: portfolio_item_edit.php');
    } else {
        // echo 'update kora jabe';
        $update_query = "UPDATE portfolio_one SET heading='$heading',sub_head='$sub_head' WHERE id=$id";
        mysqli_query($db_conect, $update_query);
        header('location: portfolio_item.php');

        if ($_FILES['portfolio_image']['name']) {

            $image_orginal_name = $_FILES['portfolio_image']['name'];
            $image_orginal_size = $_FILES['portfolio_image']['size'];
            if ($image_orginal_size <= 2000000) {

                $after_explode = explode('.', $image_orginal_name);
                // print_r($after_explode);
                $image_extention = end($after_explode);
                // print_r($image_extention);
                $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
                if (in_array($image_extention, $allow_extention)) {

                    $get_image_location = "SELECT image_location FROM portfolio_one WHERE id=$id";

                    $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                    $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);

                    // print_r($after_assoc_image_location);
                    // echo $after_assoc_image_location['image_location'];

                    unlink('../' . $after_assoc_image_location['image_location']);
                    $image_new_name = $id . "." . $image_extention;
                    $save_location = "../uploads/portfolio/" . $image_new_name;
                    move_uploaded_file($_FILES['portfolio_image']['tmp_name'], $save_location);
                    $image_location = "uploads/portfolio/" . $image_new_name;
                    $update_new_image_query = "UPDATE portfolio_one SET image_location='$image_location' WHERE id=$id";
                    mysqli_query($db_conect, $update_new_image_query);
                    $_SESSION['update_success'] = "Update Sucessfully!!";

                    header('location: portfolio_item.php');
                }
            } else {
                $_SESSION['portfolio_image'] = "Image is too big!! more than 2MB";
                header('location: portfolio_item_edit.php');
            }
        }
    }
}
