<?php
// print_r($_GET);
require_once('../config.php');

$id = $_GET['social_id'];
$update_sts_query = "UPDATE social_medias SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
header('location: social_media.php');
