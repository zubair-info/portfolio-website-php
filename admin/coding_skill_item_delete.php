<?php
require_once('../config.php');
$id = $_GET['coding_skill_id'];
$delete_query = "DELETE FROM `coding_skills` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: coding_skill_item.php');
