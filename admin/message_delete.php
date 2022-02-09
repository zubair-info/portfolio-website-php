<?php
require_once('../config.php');
$id = $_GET['message_id'];
$delete_query = "DELETE FROM `guest_messages` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: guest_message.php');
