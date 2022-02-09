<?php
require_once('../config.php');
foreach ($_POST['check'] as $key_id => $check) {
    $delete_query = "DELETE FROM `users` WHERE id=$key_id";
    mysqli_query($db_conect, $delete_query);
}
// if (isset($_POST['delete'])) {
//     $checkbox = $_POST['check'];
//     for ($i = 0; $i < count($checkbox); $i++) {
//         $del_id = $checkbox[$i];
//         mysqli_query($conn, "DELETE FROM users WHERE id='" . $del_id . "'");
//         // $message = "Data deleted successfully !";
//     }
// }



header('location: user_list.php');
