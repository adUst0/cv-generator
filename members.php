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
    <title>CV Generator | My Profile</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-left"><img src="img/logo2.png" id="logo-img"></a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="members.php">My Profile</a></li>
                <li><a href="my_cv.php">My CV</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <header id="site-header" class="cl_white text-center">
        <h1>CV Generator | Create your perfect CV</h1>
    </header>

    <section class="container-fluid center-block text-center" id="main-section">
        <h1>My Profile</h1>
        <p> Welcome, <?php echo $_SESSION['name'];?>!</p>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Personal data</h4>
                    </div>
                    <form class="col-md-8 col-md-offset-2" action="./php/update_user_data.php" method="post">
                        <div class="form-group">Location:
                            <input required class="form-control" type="text" id="location" name="location" placeholder="Sofia, Bulgaria" value="<?php echo $user_data['location']; ?>">
                        </div>
                        <div class="form-group">Email:
                            <input class="form-control" type="email" id="email" name="email" placeholder="Leave empty to use the login email" value="<?php echo $user_data['email']; ?>">
                        </div>
                        <div class="form-group">Sex:
                            <select required class="form-control" id="sex" name="sex">
                                <option value="male" <?php if ($user_data['sex'] == 'male') echo "selected" ?>>Male</option>
                                <option value="female" <?php if ($user_data['sex'] == 'female') echo "selected" ?>>Female</option>
                                <option value="other" <?php if ($user_data['sex'] == 'other') echo "selected" ?>>Other</option>
                                <option value="-" <?php if ($user_data['sex'] == '-') echo "selected" ?>>-</option>
                              </select>
                        </div>
                        <div class="form-group">Birth date:
                            <input class="form-control" type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user_data['date_of_birth']; ?>">
                        </div>
                        <div class="form-group">Nationality:
                            <input class="form-control" type="text" id="nationality" name="nationality" placeholder="Bulgarian" value="<?php echo $user_data['nationality']; ?>">
                        </div>
                        <div class="form-group">Driving license:
                            <input class="form-control" type="text" id="driving_license" name="driving_license" placeholder="AM, B" value="<?php echo $user_data['driving_license']; ?>">
                        </div>
                        <div class="form-group">Mother tongue:
                            <input required class="form-control" type="text" id="mother_tongue" name="mother_tongue" placeholder="Bulgarian" value="<?php echo $user_data['mother_tongue']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update_f1" class="btn btn-success btn-block">Update</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Other Languages</h4>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <table width="100%" class="text-left">
                            <tr>
                                <th>Language</th>
                                <th>Level</th>
                                <th>Remove</th>
                            </tr>
                            <?php

                                $stmt = $db_conn->query("SELECT id, lang, level FROM languages WHERE user_id = ?", [$_SESSION['user_id']]);

                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                    print "<tr><td>$row[1]</td><td>$row[2]</td>";
                                    print "<td><form method=\"post\" action=\"./php/remove_language.php\">
                                    <input type=\"text\" name=\"id\" style=\"display: none\" value=\"$row[0]\">
                                    <button type=\"submit\" class=\"btn btn-danger\">-</button></form></td>";
                                    print "</tr>";
                                }
                            ?>
                        </table>
                        <form action="./php/add_language.php" method="post" style="margin-top: 20px">
                            <div class="form-group">Language:
                                <input class="form-control" type="text" id="lang" name="lang" placeholder="English">
                            </div>
                            <div class="form-group">Level:
                                <select class="form-control" id="level" name="level">
                                    <option value="A1" selected="">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_lang" class="btn btn-success btn-block">Add language</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Education</h4>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <table width="100%" class="text-left">
                            <tr>
                                <th>Education title</th>
                                <th>Institution name</th> 
                                <th>From date</th>
                                <th>To date</th>
                                <th>Remove</th>
                            </tr>
                            <?php

                                $stmt = $db_conn->query("SELECT id, title, institution, from_date, to_date FROM education WHERE user_id = ?", [$_SESSION['user_id']]);

                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                    print "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>";
                                    print "<td><form method=\"post\" action=\"./php/remove_education.php\">
                                    <input type=\"text\" name=\"id\" style=\"display: none\" value=\"$row[0]\">
                                    <button type=\"submit\" class=\"btn btn-danger\">-</button></form></td>";
                                    print "</tr>";
                                }
                            ?>
                        </table>
                        <form action="./php/add_education.php" method="post" style="margin-top: 20px">
                            <div class="form-group">Education Title:
                                <input class="form-control" type="text" id="title" name="title" placeholder="Computer Science">
                            </div>
                            <div class="form-group">Institution name:
                                <input class="form-control" type="text" id="institution" name="institution" placeholder="FMI, SU">
                            </div>
                            <div class="form-group">From date:
                                <input class="form-control" type="text" id="from_date" name="from_date" placeholder="2019-01-01">
                            </div>
                            <div class="form-group">To date:
                                <input class="form-control" type="text" id="to_date" name="to_date" placeholder="2019-01-01">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_job" class="btn btn-success btn-block">Add education</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Work experience</h4>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <table width="100%" class="text-left">
                            <tr>
                                <th>Job Title</th>
                                <th>Company</th> 
                                <th>From date</th>
                                <th>To date</th>
                                <th>Remove</th>
                            </tr>
                            <?php

                                $stmt = $db_conn->query("SELECT id, job_title, company, from_date, to_date FROM work_experience WHERE user_id = ?", [$_SESSION['user_id']]);

                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                    print "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>";
                                    print "<td><form method=\"post\" action=\"./php/remove_work.php\">
                                    <input type=\"text\" name=\"id\" style=\"display: none\" value=\"$row[0]\">
                                    <button type=\"submit\" class=\"btn btn-danger\">-</button></form></td>";
                                    print "</tr>";
                                }
                            ?>
                        </table>
                        <form action="./php/add_work.php" method="post" style="margin-top: 20px">
                            <div class="form-group">Job Title:
                                <input class="form-control" type="text" id="job_title" name="job_title" placeholder="Software Engineer">
                            </div>
                            <div class="form-group">Company:
                                <input class="form-control" type="text" id="company" name="company" placeholder="Company">
                            </div>
                            <div class="form-group">From date:
                                <input class="form-control" type="text" id="from_date" name="from_date" placeholder="2019-01-01">
                            </div>
                            <div class="form-group">To date:
                                <input class="form-control" type="text" id="to_date" name="to_date" placeholder="2019-01-01">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_job" class="btn btn-success btn-block">Add job</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>Skills</h4>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <table width="100%" class="text-left">
                            <tr>
                                <th>Skill</th>
                                <th>Remove</th>
                            </tr>
                            <?php

                                $stmt = $db_conn->query("SELECT id, title FROM skills WHERE user_id = ?", [$_SESSION['user_id']]);

                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                    print "<tr><td>$row[1]</td>";
                                    print "<td><form method=\"post\" action=\"./php/remove_skill.php\">
                                    <input type=\"text\" name=\"id\" style=\"display: none\" value=\"$row[0]\">
                                    <button type=\"submit\" class=\"btn btn-danger\">-</button></form></td>";
                                    print "</tr>";
                                }
                            ?>
                        </table>
                        <form action="./php/add_skill.php" method="post" style="margin-top: 20px">
                            <div class="form-group">Skill:
                                <input class="form-control" type="text" id="title" name="title" placeholder="My good skill">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_skill" class="btn btn-success btn-block">Add skill</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6"></div>
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