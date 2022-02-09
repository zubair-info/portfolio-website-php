<?php
// print_r($_GET);
require_once('../config.php');

$id = $_GET['funfact_id'];
$update_sts_query = "UPDATE funfact_items SET active_sts=1 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
header('location: funfact_item.php');
