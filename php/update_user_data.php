<?php
session_start();
include("Db.php");
include("config.php");

$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

$location = $_POST['location'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$date_of_birth = $_POST['date_of_birth'];
$nationality = $_POST['nationality'];
$driving_license = $_POST['driving_license'];
$mother_tongue = $_POST['mother_tongue'];

$stmt = $db_conn->query("SELECT * FROM user_data WHERE user_id=?", [$_SESSION['user_id']]);
if ($stmt->rowCount() == 0) {
    $stmt = $db_conn->query("INSERT INTO user_data (user_id, location, email, sex, date_of_birth, nationality, driving_license, mother_tongue) VALUES (?, ?, ?, ?, ?, ?, ?, ?);", 
    [$_SESSION['user_id'], $location, $email, $sex, $date_of_birth, $nationality, $driving_license, $mother_tongue]);

    header("location:../members.php");
    exit;
}
else {
    $stmt = $db_conn->query("UPDATE user_data SET location = ?, email = ?, sex = ?, date_of_birth = ?, nationality = ?, driving_license = ?, mother_tongue = ? WHERE user_id = ?;", 
    [$location, $email, $sex, $date_of_birth, $nationality, $driving_license, $mother_tongue, $_SESSION['user_id']]);

    header("location:../members.php");
    exit;
}

?>