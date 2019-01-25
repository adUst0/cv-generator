<?php
session_start();

if (!$_SESSION['email']) {
    header("Location:login.php");
    exit;
}

include("php/Db.php");
include("php/config.php");
$db_conn = new Db($db_servername, $db_name, $db_username, $db_password);

$data_query = $db_conn->query("SELECT * FROM user_data WHERE id = ?", [$_SESSION['user_id']]);
$user_data = $data_query->fetch();
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
                <li><a href="index.php">Home</a></li>
                <?php if (!isset($_SESSION['email'])) {
                    echo '<li><a href="register.php">Register</a></li>';
                    echo '<li><a href="login.php">Login</a></li>';
                }?>
                <li><a href="members.php">My Profile</a></li>
                <li class="active"><a href="my_cv.php">My CV</a></li>
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
            <div class="page-header"><h3>My CV | <?php echo $_SESSION['name'];?></h3></div>

            <table border="1" width="100%" rules=none class="text-left" id="cv">
                <col style="width:35%">
                <col style="width:65%">
                <tr>
                    <th><h3>PERSONAL INFORMATION</h3></th>
                    <th><h3><?php echo $_SESSION['name'];?><h3></th>
                </tr>
                <?php
                    if ($user_data['location'] != "") {
                        echo '<tr>
                            <td></td>
                            <td>Location: ' . $user_data['location'] . '</td>
                        </tr>';
                    }
                ?>
                <?php
                    if ($user_data['email'] != "") {
                        echo '<tr>
                            <td></td>
                            <td>Email: ' . $user_data['email'] . '</td>
                        </tr>';
                    }
                    else {
                        echo '<tr>
                            <td></td>
                            <td>Email: ' . $_SESSION['email'] . '</td>
                        </tr>';
                    }
                ?>
                <?php
                    if ($user_data['sex'] != "") {
                        echo '<tr>
                            <td></td>
                            <td>Sex: ' . $user_data['sex'] . '</td>
                        </tr>';
                    }
                ?>
                <?php
                    if ($user_data['date_of_birth'] != "") {
                        echo '<tr>
                            <td></td>
                            <td>Date of birth: ' . $user_data['date_of_birth'] . '</td>
                        </tr>';
                    }
                ?>
                <?php
                    if ($user_data['nationality'] != "") {
                        echo '<tr>
                            <td></td>
                            <td>Nationality: ' . $user_data['nationality'] . '</td>
                        </tr>';
                    }
                ?>
                <?php
                    if ($user_data['mother_tongue'] != "") {
                        echo '<tr>
                            <td></td>
                            <td>Mother tongue: ' . $user_data['mother_tongue'] . '</td>
                        </tr>';
                    }
                ?>
                <?php
                    if ($user_data['driving_license'] != "") {
                        echo '<tr>
                            <td></td>
                            <td>Driving license: ' . $user_data['driving_license'] . '</td>
                        </tr>';
                    }
                ?>

                <tr>
                    <th><h3>WORK EXPERIENCE</h3></th>
                    <th><hr></th>
                </tr>
                <?php

                    $stmt = $db_conn->query("SELECT * FROM work_experience WHERE user_id = ?", [$_SESSION['user_id']]);

                    while ($row = $stmt->fetch()) {
                        echo '
                            <tr>
                                <td style="padding-bottom: 0;">' . $row['from_date'] . ' - ' . $row['to_date'] . '</td>
                                <td style="padding-bottom: 0;"><h4>'. $row['job_title'] . '</h4></td>
                            </tr>
                            <tr>
                                <td style="padding-top: 0;"></td>
                                <td style="padding-top: 0;"><h5>'. $row['company'] . '</h5></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>';
                    }
                ?>

                <tr>
                    <th><h3>EDUCATION AND TRAINING</h3></th>
                    <th><hr></th>
                </tr>
                <?php
                    $stmt = $db_conn->query("SELECT * FROM education WHERE user_id = ?", [$_SESSION['user_id']]);

                    while ($row = $stmt->fetch()) {
                        echo '
                            <tr>
                                <td style="padding-bottom: 0;">' . $row['from_date'] . ' - ' . $row['to_date'] . '</td>
                                <td style="padding-bottom: 0;"><h4>'. $row['title'] . '</h4></td>
                            </tr>
                            <tr>
                                <td style="padding-top: 0;"></td>
                                <td style="padding-top: 0;"><h5>'. $row['institution'] . '</h5></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>';
                    }
                ?>

                <tr>
                    <th><h3>JOB-RELATED SKILLS</h3></th>
                    <th><hr></th>
                </tr>
                <?php
                    $stmt = $db_conn->query("SELECT * FROM skills WHERE user_id = ?", [$_SESSION['user_id']]);

                    echo '<tr><td></td><td><ul>';

                    while ($row = $stmt->fetch()) {
                        echo '<li>' . $row['title'] . '</li>';
                    }
                    echo '</ul></td></tr>';
                ?>

                <tr>
                    <th><h3>FOREIGN LANGUAGES</h3></th>
                    <th><hr></th>
                </tr>
                <?php
                    $stmt = $db_conn->query("SELECT * FROM languages WHERE user_id = ?", [$_SESSION['user_id']]);

                    while ($row = $stmt->fetch()) {
                        echo '<tr><td class="text-right"><h4>' . $row['lang'] . '</h4></td><td><h4>' . $row['level'] . '</h4></tf></tr>';
                    }
                ?>
            </table>
        </div>

    </section>

    <footer id="site-footer" class="navbar navbar-default">
        <div class="container text-center">
            <p>Всички права запазени - Борис Иванов, Уеб технологии 2018</p>
        </div>
    </footer>

</body>
</html>