<?php
session_start();
require_once('../config.php');

// $id = $_GET['about_id'];
$id = $_POST['id'];
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$designation  = filter_var($_POST['designation'], FILTER_SANITIZE_STRING);
$detail = filter_var($_POST['detail'], FILTER_SANITIZE_STRING);
$from = filter_var($_POST['from'], FILTER_SANITIZE_STRING);
$live_in = filter_var($_POST['live_in'], FILTER_SANITIZE_STRING);
$gender = $_POST['gender'];
$age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);
$button = filter_var($_POST['button'], FILTER_SANITIZE_STRING);
$button_link = filter_var($_POST['button_link'], FILTER_SANITIZE_URL);

$about_image = $_FILES['about_image']['name'];



if (empty($name)) {
    $_SESSION['error_msg_name'] = " Name  Requried";
    header('location: about_item_edit.php');
} elseif (empty($designation)) {
    $_SESSION['error_msg_degination'] = "Degination Requried";
    header('location: about_item_edit.php');
} elseif (empty($detail)) {
    $_SESSION['error_msg_detail'] = "Detail Requried";
    header('location: about_item_edit.php');
} elseif (empty($from)) {
    $_SESSION['error_msg_from'] = "From Requried";
    header('location: about_item_edit.php');
} elseif (empty($live_in)) {
    $_SESSION['error_msg_live_in'] = "Live in Requried";
    header('location: about_item_edit.php');
}
//  elseif (empty($gender)) {
//     $_SESSION['error_msg_gender'] = "Gender Requried";
//     header('location: about.php');
// } 
elseif (empty($button)) {
    $_SESSION['error_msg_button'] = "Gender Requried";
    header('location: about_item_edit.php');
} elseif (empty($button_link)) {
    $_SESSION['error_msg_button_link'] = "Gender Requried";
    header('location: about_item_edit.php');
} else {
    // echo 'update kora jabe';
    $update_query = "UPDATE `abouts` SET `name`='$name',`designation`='$designation',`detail`='$detail',`from`='$from',`live_in`='$live_in',`age`='$age',`gender`='$gender',`button`='$button',`button_link`='$button_link' WHERE id=$id";
    mysqli_query($db_conect, $update_query);
    header('location: about.php');
    $image_orginal_name = $_FILES['about_image']['name'];
    $image_orginal_size = $_FILES['about_image']['size'];

    if ($_FILES['about_image']['name']) {


        if ($image_orginal_size <= 2000000) {

            $after_explode = explode('.', $image_orginal_name);
            // print_r($after_explode);
            $image_extention = end($after_explode);
            // print_r($image_extention);
            $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
            if (in_array($image_extention, $allow_extention)) {

                $get_image_location = "SELECT image_location FROM abouts WHERE id=$id";

                $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);
                // echo $after_assoc_image_location['image_location'];

                unlink('../' . $after_assoc_image_location['image_location']);
                $image_new_name = $id . "." . $image_extention;
                $save_location = "../uploads/about/" . $image_new_name;
                move_uploaded_file($_FILES['about_image']['tmp_name'], $save_location);
                $image_location = "uploads/about/" . $image_new_name;
                $update_new_image_query = "UPDATE abouts SET image_location='$image_location' WHERE id=$id";
                mysqli_query($db_conect, $update_new_image_query);

                header('location: about.php');
                $_SESSION['update_success'] = "About Update Sucessfully!!";
            }
        } else {
            $_SESSION['about_image'] = "Image is too big!! more than 2MB";
        }
    } else {
        $_SESSION['about_image'] = "Image requried";
    }
}
