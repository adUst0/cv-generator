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

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-left"><img src="img/logo2.png" id="logo-img"></a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="#">Member area</a></li>
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
            ?>
            <form class="col-md-8 col-md-offset-2">
                <div class="form-group">Email:
                    <input class="form-control" placeholder="Email" type="email" name="">
                </div>
                <div class="form-group">Password:
                    <input class="form-control" placeholder="Password" type="password" name="">
                </div>
                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit" name="">
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