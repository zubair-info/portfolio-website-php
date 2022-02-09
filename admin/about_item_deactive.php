<?php
session_start();
// print_r($_GET);
require_once('../config.php');

$id = $_GET['about_id'];
$update_sts_query = "UPDATE abouts SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);

header('location: about.php');
$_SESSION['make_active_sts_sucess'] = "Active Sucessfully!!";
