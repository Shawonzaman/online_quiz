<?php
session_start();
require_once './class/database_connection.php';
require_once './class/sign_up.php';
$db_con_obj = new Database_connection();
$sign_up_obj = new Sign_up();

if ((isset($_SESSION['sess_user_admin_login_id']) != NULL)) {
    header('Location:deshbord.php');
}

if (isset($_POST['lOGINbtn'])) {
    $sign_up_obj->save_user_information($_POST);
}

if (isset($_POST['chkBtn'])) {
    $msg = $sign_up_obj->check_user_login_information($_POST);
    
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

        <title>Online Quiz</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <style>
            .sign-up{
                box-shadow: 0 0 10px #000;
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
                    <a class="navbar-brand" href="#">Online Quiz</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form method="post" action="index.php" class="navbar-form navbar-right">
                        <div class="form-group">
                            <input required name="chkEmail" type="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input required name="chkPassword" type="password" placeholder="Password" class="form-control">
                        </div>
                        <button name="chkBtn" type="submit" class="btn btn-success">Sign in</button>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container-fluid" style="padding-top: 20px">
                <div class="col-sm-8">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="images/banner.png" alt="Quiz">
                            </div>

                            <div class="item">
                                <img src="images/1.png" alt="Quiz">
                            </div>

                            <div class="item">
                                <img src="images/2.jpg" alt="Quiz">
                            </div>

                            <div class="item">
                                <img src="images/3.jpg" alt="Quiz">
                            </div>
                            
                             <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                        <!-- Left and right controls -->
                       
                    </div>
                </div>
                <div class="col-sm-4 sign-up" style="background: white;">

<?php
if (isset($msg)) {
    echo '<center><h3 style=color:green>' . $msg . '</h3></center>';
}
?>
                    <h3 style="border-bottom: 5px solid green" class="text-center">Online Quiz Registration Form</h3><br>

                    <form method="post" action="" class="myform">

                        <div class="input-group form-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                            <input name="user_name" type="text" class="form-control" placeholder="Please Type Your Name" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
                            <input name="user_email" type="email" class="form-control" placeholder="Please Type Your Email Address" aria-describedby="basic-addon2" required>
                        </div>

                        <div class="input-group form-group">
                            <span class="input-group-addon" id="basic-addon3"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
                            <input name="user_password" type="password" class="form-control" placeholder="Please Type Your Password" aria-describedby="basic-addon3"  required>
                        </div>
                        <br>

                        <div class="input-group form-group  col-sm-4 col-sm-offset-4">

                            <input type="submit" class="form-control btn-success" name="lOGINbtn" value="Submit">
                        </div>
                        <br>

                    </form>
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
<script>
</script>