<?php
session_start();
require_once('../config.php');
// print_r($_POST);

// $coding_skill = filter_var($_POST['coding_skill'], FILTER_SANITIZE_STRING);
$skill_caption = filter_var($_POST['skill_caption'], FILTER_SANITIZE_STRING);
$progress_percent = filter_var($_POST['progress_percent'], FILTER_SANITIZE_NUMBER_INT);


// if (empty($coding_skill)) {
//     $_SESSION['error_msg_coding_skill'] = "Coding Skill Name Requried";
//     header('location: coding_skill_item.php');
// } else
if (empty($skill_caption)) {
    $_SESSION['error_msg_skill_caption'] = "Coding Caption Name Requried";
    header('location: design_skill_item.php');
} elseif (empty($progress_percent)) {
    $_SESSION['error_msg_skill_progress_percent'] = "Progress Percentage Number  Requried";
    header('location: design_skill_item.php');
} else {
    // echo 'update kora jabe';
    $insert_query = "INSERT INTO `design_skills` (`skill_caption`, `progress_percent`) VALUES ('$skill_caption','$progress_percent')";
    mysqli_query($db_conect, $insert_query);
    header('location: design_skill_item.php');
    $_SESSION['update_success'] = "Design skills Update Sucessfully!!";
}
