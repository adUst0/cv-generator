<?php
session_start();
include("Db.php");
include("config.php");

$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

$id = $_POST['id'];

$stmt = $db_conn->query("DELETE FROM skills WHERE id = ?", [$id]);

header("location:../members.php");
exit;

?>