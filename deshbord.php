<?php
session_start();
require_once './class/database_connection.php';
require_once './class/sign_up.php';
require_once './class/logout.php';
require_once './class/quiz.php';

$db_con_obj = new Database_connection();
$sign_up_obj = new Sign_up();
$logout_obj = new Logout();
$quiz_obj = new Quiz();


if ((isset($_POST['btnQuizTopic']))) {
    $quiz_obj->add_quiz_topic($_POST);
}
$all_quiz = $quiz_obj->select_all_quiz();


if ((isset($_POST['logOutBtn']))) {
    $logout_obj->user_log_out();
}

if ((isset($_SESSION['sess_user_admin_login_id']) == NULL)) {
    header('Location:index.php');
}
$result = $_SESSION['result'];



if ((isset($_POST['btnQuestion']))) {
    $question_id = $quiz_obj->add_question($_POST);
    $quiz_obj->save_question_option($question_id, $_POST);
}
$all_quiz_topic = $quiz_obj->select_all_quiz();



if (isset($_GET['option'])) {


    switch ($_GET['option']) {
        case 'class':
            $page = 'view_quiz.php';
            break;

        default:
            break;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Online Quiz-Dashboard</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <style>

            a:hover{
                text-decoration: none !important;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="deshbord.php">Online Quiz</a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <form method="post" action="" class="navbar-form navbar-right">

                        <button name="logOutBtn" type="submit" class="btn btn-success">Logout</button>
                    </form>
                </div>

            </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container" style="padding-top: 20px">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <a href="#" class="thumbnail">
                            <img src="images/profile.jpg" alt="...">
                            <h3 style="text-align: center"><?php echo $result['user_name']; ?></h3>
                            <h5 style="text-align: center"><?php echo $result['user_email']; ?></h5>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-9">
<?php
if (isset($page)) {
    include './' . $page;
} else {
    ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">Online Test</div>
                                <div class="panel-body">
                                    <div class="list-group">
    <?php
    while ($row = mysql_fetch_assoc($all_quiz)) {
        ?>
                                            <button type="button" class="list-group-item btn-success"><a href="?option=class&quiz_topic_id=<?php echo $row['quiz_topic_id']; ?>"><?php echo $row['quiz_topic_name'] ?></a></button>

    <?php } ?>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">


            <footer>
                
            </footer>
        </div> <!-- /container -->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
