<?php
require_once('../config.php');
$id = $_GET['education_id'];
$delete_query = "DELETE FROM `educations` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: education.php');
