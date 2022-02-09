<?php
// print_r($_GET);
require_once('../config.php');

$id = $_GET['portfolio_id'];
$update_sts_query = "UPDATE portfolio_head_one SET active_sts=2 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
header('location: portfolio_item.php');
