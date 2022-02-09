<?php
require_once('../config.php');
$id = $_GET['service_id'];
$delete_query = "DELETE FROM `services` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: service.php');
