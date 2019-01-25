<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV Generator | Home</title>

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
                <li class="active"><a href="index.php">Home</a></li>
                <?php if (!isset($_SESSION['email'])) {
                    echo '<li><a href="register.php">Register</a></li>';
                    echo '<li><a href="login.php">Login</a></li>';
                }?>
                <li><a href="members.php">My Profile</a></li>
                <li><a href="my_cv.php">My CV</a></li>
                <?php if (isset($_SESSION['email'])) {
                    echo '<li><a href="php/logout.php">Logout</a></li>';
                }?>
            </ul>
        </div>
    </nav>

    <header id="site-header" class="cl_white text-center">
        <h1>CV Generator | Create your perfect CV</h1>
    </header>

    <section class="container-fluid center-block text-center" id="main-section">
        <div class="container">
            <h1>Hello there</h1>
            <p>Welcome to free CV generation</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="page-header">
                        <h3>Login</h3>
                    </div>
                    <a href="login.php" class="thumbnail"><img src="img/login.png" class="img-fluid"></a>
                </div>
                <div class="col-md-4">
                    <div class="page-header">
                        <h3>Register</h3>
                    </div>
                    <a href="register.php" class="thumbnail"><img src="img/register.png" class="img-fluid"></a>
                </div>
                <div class="col-md-4">
                    <div class="page-header">
                        <h3>Create CV</h3>
                    </div>
                    <a href="my_cv.php" class="thumbnail"><img src="img/logo.png" class="img-fluid"></a>
                </div>
            </div>
        </div>

    </section>

    <footer id="site-footer" class="navbar navbar-default">
        <div class="container text-center">
            <p>Всички права запазени - Борис Иванов, Уеб технологии 2018</p>
        </div>
    </footer>

</body>
</html>