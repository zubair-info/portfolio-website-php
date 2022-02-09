<?php
require_once('../config.php');
$id = $_GET['social_id'];

$delete_query = "DELETE FROM `social_medias` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: social_media.php');
