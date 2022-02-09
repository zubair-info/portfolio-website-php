<?php
session_start();
// print_r($_GET);
require_once('../config.php');

$id = $_GET['experience_id'];
$update_sts_query = "UPDATE experiences SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
$_SESSION['make_active_sts_sucess'] = "Active Sucessfully!!";
header('location: experience.php');
