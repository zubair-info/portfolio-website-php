<?php
require_once('../config.php');
$id = $_GET['portfolio_id'];
$get_image_location = "SELECT image_location FROM portfolio_one WHERE id=$id";
$from_db = mysqli_query($db_conect, $get_image_location);
$after_assoc = mysqli_fetch_assoc($from_db);
// echo $after_assoc['image_location'];
unlink('../' . $after_assoc['image_location']);
$delete_query = "DELETE FROM `portfolio_one` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: portfolio_item.php');
