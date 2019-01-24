<?php
session_start();
include("Db.php");
include("config.php");

$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

$title = $_POST['title'];

$stmt = $db_conn->query("INSERT INTO skills (user_id, title) VALUES (?, ?);", 
[$_SESSION['user_id'], $title]);

header("location:../members.php");
exit;

?>