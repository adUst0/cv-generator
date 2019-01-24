<?php

include("Db.php");
include("config.php");

if (isset($_POST['register'])) {
    $db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if user exists
    $stmt = $db_conn->query("SELECT * FROM users WHERE email=?", [$email]);
    if ($stmt->rowCount() != 0) {
        header("location:../register.php?user_exists=t");
        exit;
    }

    $stmt = $db_conn->query("INSERT INTO users(name, email, password) VALUE(?, ?, ?)", [$name, $email, $password]);

    if ($stmt->rowCount() > 0) {
        header("location:../login.php?reg_c=t");
        exit;
    }


}

?>