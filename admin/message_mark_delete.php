<?php
require_once('../config.php');
foreach ($_POST['check'] as $key_id => $check) {
    $delete_query = "DELETE FROM `guest_messages` WHERE id=$key_id";
    mysqli_query($db_conect, $delete_query);
}
header('location: guest_message.php');
