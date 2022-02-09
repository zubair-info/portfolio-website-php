<?php

require_once('../config.php');

//  print_r($_POST);
$guest_name = $_POST['guest_name'];
$guest_name = filter_var($_POST['guest_name'], FILTER_SANITIZE_STRING);
$guest_email = filter_var($_POST['guest_email'], FILTER_SANITIZE_EMAIL);
$email_lower = strtolower($guest_email);
$valid_email = filter_var($email_lower, FILTER_VALIDATE_EMAIL);
$guest_subject = filter_var($_POST['guest_subject'], FILTER_SANITIZE_STRING);
$guest_message = filter_var($_POST['guest_message'], FILTER_SANITIZE_STRING);

if ($valid_email) {

    $insert_query = "INSERT INTO `guest_messages`( `guest_name`, `guest_email`, `guest_subject`, `guest_message`) VALUES ('$guest_name','$valid_email','$guest_subject','$guest_message')";
    mysqli_query($db_conect, $insert_query);
    $_SESSION['update_successs'] = "Message Sent Sucessfully!!";

    header('location: ../index.php');
}
