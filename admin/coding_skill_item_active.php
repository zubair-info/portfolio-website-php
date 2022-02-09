<?php
session_start();
// print_r($_GET);
require_once('../config.php');

$id = $_GET['coding_skill_id'];
$update_sts_query = "UPDATE coding_skills SET active_sts=2 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);

header('location: coding_skill_item.php');
$_SESSION['make_active_sts_sucess'] = "Active Sucessfully!!";
