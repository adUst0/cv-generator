<?php
session_start();
include("Db.php");
include("config.php");

$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

$title = $_POST['title'];
$institution = $_POST['institution'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

$stmt = $db_conn->query("INSERT INTO education (user_id, title, institution, from_date, to_date) VALUES (?, ?, ?, ?, ?);", 
[$_SESSION['user_id'], $title, $institution, $from_date, $to_date]);

header("location:../members.php");
exit;

?>