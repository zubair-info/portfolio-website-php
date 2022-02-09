<?php
require_once('../config.php');
$id = $_GET['portfolio_id'];
$delete_query = "DELETE FROM `portfolio_head_one` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: portfolio_item.php');
