<?php
session_start();
include("Db.php");
include("config.php");

$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

$job_title = $_POST['job_title'];
$company = $_POST['company'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

$stmt = $db_conn->query("INSERT INTO work_experience (user_id, job_title, company, from_date, to_date) VALUES (?, ?, ?, ?, ?);", 
[$_SESSION['user_id'], $job_title, $company, $from_date, $to_date]);

header("location:../members.php");
exit;

?>