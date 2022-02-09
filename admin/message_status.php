<?php
// print_r($_GET);
require_once('../config.php');

$id = $_GET['message_id'];
$update_sts_query = "UPDATE guest_messages SET read_sts=2 WHERE id=$id";
mysqli_query($db_conect, $update_sts_query);
header('location: guest_message.php');
