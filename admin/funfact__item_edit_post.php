<?php
session_start();
require_once('../config.php');

// $id = $_GET['funfact_id'];
$id = $_POST['id'];

$funfact_counter = filter_var($_POST['funfact_counter'], FILTER_SANITIZE_NUMBER_INT);
$white_head = filter_var($_POST['white_head'], FILTER_SANITIZE_STRING);


if (empty($funfact_counter)) {
    $_SESSION['error_msg_funfact_counter'] = "Funfact Counter Number Requried";
    header('location: funfact_item_edit.php');
} elseif (empty($white_head)) {
    $_SESSION['error_msg_white_head'] = "Funfact White Heading Requried";
    header('location: funfact_item_edit.php');
} else {
    // echo 'update kora jabe';
    $update_query = "UPDATE `funfact_items` SET `funfact_counter`='$funfact_counter',`white_head`='$white_head' WHERE id=$id";
    mysqli_query($db_conect, $update_query);
    header('location: funfact_item.php');
    $_SESSION['update_success']="Funfact Update Sucessfully!!";

}
