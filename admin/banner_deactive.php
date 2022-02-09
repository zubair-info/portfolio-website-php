<?php
session_start();
// print_r($_GET);
require_once('../config.php');

$id = $_GET['banner_id'];
$update_sts_query = "UPDATE banners SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);

header('location: banner.php');
$_SESSION['make_deactive_sts_sucess'] = "De-Active Sucessfully!!";
