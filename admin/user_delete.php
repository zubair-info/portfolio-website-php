<?php
require_once('../config.php');
$id = $_GET['user_id'];

$delete_query = "DELETE FROM `users` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: user_list.php');
