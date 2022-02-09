<?php
require_once('../config.php');
$id = $_GET['funfact_id'];
$get_image_location = "SELECT image_location FROM funfact_items WHERE id=$id";
$from_db = mysqli_query($db_conect, $get_image_location);
$after_assoc = mysqli_fetch_assoc($from_db);
unlink('../' . $after_assoc['image_location']);
$delete_query = "DELETE FROM `funfact_items` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: funfact_item.php');
