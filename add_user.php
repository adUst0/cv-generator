<?php

include("Db.php");

$db_servername = "localhost";
$db_name = "cv_generator";
$db_username = "root";
$db_password = "";

$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if user exists
    $stmt = $db_conn->query("SELECT * FROM users WHERE email=?", [$email]);
    if ($stmt->rowCount() != 0) {
        header("location:register.php?user_exists=t");
        exit;
    }

    $stmt = $db_conn->query("INSERT INTO users(name, email, password) VALUE (?, ?, ?)", [$name, $email, $password]);

    if ($stmt->rowCount()) {
        header("location:login.php?reg_c=t");
        echo "<script>alert('Registration succesful.')</script>";
        exit;
    }


}

?>