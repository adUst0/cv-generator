<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV Generator | Register</title>

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
                <li class="active"><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="#">Member area</a></li>
            </ul>
        </div>
    </nav>

    <header id="site-header" class="cl_white text-center">
        <h1>CV Generator | Create your perfect CV</h1>
    </header>

    <section class="text-center center-block" id="main-section">
        <div class="container" id="login-div">
            <div class="page-header"><h3>Register</h3></div>
            <?php 
                if (isset($_GET['user_exists'])) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">User with this email already exists!</div>"; 
                }
            ?>
            <form method="post" class="col-md-8 col-md-offset-2" action="./add_user.php">
                <div class="form-group">Name:
                    <input class="form-control" placeholder="Full name" type="text" 
                    name="name" minlength="3" maxlength="100" required>
                </div>
                <div class="form-group">Email:
                    <input class="form-control" placeholder="Email" type="email" 
                    name="email" minlength="5" maxlength="100" required>
                </div>
                <div class="form-group">Password:
                    <input class="form-control" placeholder="Password" type="password" 
                    name="password" minlength="8" maxlength="100" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-success btn-block">Register</button>
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