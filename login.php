<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV Generator | Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="navbar navbar-inverse  navbar-static-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-left"><img src="img/logo2.png" id="logo-img"></a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="members.php">My Profile</a></li>
                <li><a href="my_cv.php">My CV</a></li>
            </ul>
        </div>
    </nav>

    <header id="site-header" class="cl_white text-center">
        <h1>CV Generator | Create your perfect CV</h1>
    </header>

    <section class="text-center center-block" id="main-section">
        <div class="container" id="login-div">
            <div class="page-header"><h3>Login</h3></div>
            <?php 
                if (isset($_GET['reg_c'])) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Registration successful!</div>"; 
                }
                if (isset($_GET['log_nc'])) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Incorrect email or password!</div>"; 
                }
            ?>
            <form class="col-md-8 col-md-offset-2" method="post" action="login.php">
                <div class="form-group">Email:
                    <input class="form-control" placeholder="Email" type="email" name="email">
                </div>
                <div class="form-group">Password:
                    <input class="form-control" placeholder="Password" type="password" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
                </div>
            </form>
        </div>
    </section>

    <footer id="site-footer" class="navbar navbar-default">
        <div class="container text-center">
            <p>Всички права запазени - Борис Иванов, Уеб технологии 2018</p>
        </div>
    </footer>

</body>
</html>

<?php
include("php/Db.php");
include("php/config.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

    $stmt = $db_conn->query("SELECT * FROM users WHERE email=? AND password=?", 
        [$email, $password]);

    if ($stmt->rowCount() == 1) {
        header("location:members.php");
        $row = $stmt->fetch();

        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['user_id'] = $row['user_id'];

        exit;
    }
    else {
        header("location:login.php?log_nc=t");
        exit;
    }
}
?>