<?php
session_start();
include("Db.php");
include("config.php");

$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

$lang = $_POST['lang'];
$level = $_POST['level'];

$stmt = $db_conn->query("INSERT INTO languages (user_id, lang, level) VALUES (?, ?, ?);", 
[$_SESSION['user_id'], $lang, $level]);

header("location:../members.php");
exit;

?>