<?php
require_once('../config.php');
$id = $_GET['design_skill_id'];
$delete_query = "DELETE FROM `design_skills` WHERE id=$id";
mysqli_query($db_conect, $delete_query);
header('location: design_skill_item.php');
