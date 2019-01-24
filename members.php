<?php
session_start();

if (!$_SESSION['email']) {
    header("Location:login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV Generator | Member area</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <a href="#" class="navbar-left"><img src="img/logo2.png" id="logo-img"></a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="members.php">Member area</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <header id="site-header" class="cl_white text-center">
        <h1>CV Generator | Create your perfect CV</h1>
    </header>

    <section class="container-fluid center-block text-center" id="main-section">
        <h1>Member's area</h1>
        <p> Welcome, <?php echo $_SESSION['name'];?>!</p>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Form1</h4>
                    </div>
                    <?php 
                        if (isset($_GET['sb1_c'])) {
                            echo "<div class=\"alert alert-success\" role=\"alert\">Db updated successfully!</div>"; 
                        }
                    ?>
                    <form class="col-md-8 col-md-offset-2" action="" method="post">
                        <div class="form-group">Username:
                            <input class="form-control" type="text" id="username" name="username">
                        </div>
                        <div class="form-group">Quality:
                            <input class="form-control" type="number" id="quality" name="quality">
                        </div>
                        <div class="form-group">Quantity:
                            <input class="form-control" type="number" id="quantity" name="quantity">
                        </div>
                        <div class="form-group">Arival date:
                            <input class="form-control" type="date" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitb1" class="btn btn-success btn-block">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Form2</h4>
                    </div>
                    <form class="col-md-8 col-md-offset-2">
                        <div class="form-group">Name:
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">Email:
                            <input class="form-control" type="email">
                        </div>
                        <div class="form-group">Phone number:
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">Comment:
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>
                    </form>
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

<?php
include("php/Db.php");
include("php/config.php");

if (isset($_POST['submitb1'])) {
    $username = $_POST['username'];
    $quality = $_POST['quality'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

    if ($db_conn->query("
        INSERT INTO requests (username, quality, quantity, date)
        VALUES (?, ?, ?, ?)", [$username, $quality, $quantity, $date])) 
    {

        header("Location:members.php?sb1_c=t");
        exit;
    }

}
?>