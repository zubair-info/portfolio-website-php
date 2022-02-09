<?php
session_start();
// print_r($_GET);
require_once('../config.php');

$id = $_GET['testimonial_id'];
$update_sts_query = "UPDATE testimonial_items SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
header('location: testimonial_item.php');
$_SESSION['make_deactive_sts_sucess'] = "De-Active Sucessfully!!";
