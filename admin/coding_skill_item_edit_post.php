<?php
session_start();
require_once('../config.php');
// print_r($_POST);

// $coding_skill = filter_var($_POST['coding_skill'], FILTER_SANITIZE_STRING);
$id = $_POST['id'];
$skill_caption = filter_var($_POST['skill_caption'], FILTER_SANITIZE_STRING);
$progress_percent = filter_var($_POST['progress_percent'], FILTER_SANITIZE_NUMBER_INT);


// if (empty($coding_skill)) {
//     $_SESSION['error_msg_coding_skill'] = "Coding Skill Name Requried";
//     header('location: coding_skill_item.php');
// } else
if (empty($skill_caption)) {
    $_SESSION['error_msg_skill_caption'] = "Coding Caption Name Requried";
    header('location: coding_skill_item_edit.php');
} elseif (empty($progress_percent)) {
    $_SESSION['error_msg_skill_progress_percent'] = "Progress Percentage Number  Requried";
    header('location: coding_skill_item_edit.php');
} else {
    // echo 'update kora jabe';
    $update_query = "UPDATE `coding_skills` SET `skill_caption`='$skill_caption',`progress_percent`='$progress_percent' WHERE id=$id";
    mysqli_query($db_conect, $update_query);
    header('location: coding_skill_item.php');
    $_SESSION['update_success'] = "Coding skills Update Sucessfully!!";
}
