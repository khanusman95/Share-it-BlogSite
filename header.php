<!-- author: M. Usman Khan-->
<?php //include config
session_start();
require_once('dbcon.php');

//if not logged in redirect to login page
if (isset($_SESSION['userSession'])!="") {
	$query = $DBcon->query("SELECT avatar FROM blog_members WHERE memberID=".$_SESSION['userSession']);
    
    $DBcon->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Share It | A blog open to the whole world</title>

<link rel="stylesheet" href="css/style.css" />
<link rel='shortcut icon' href='logo-ico.ico' type='image/x-icon'/ >
<script src="js/jquery.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/semantic.min.css"/>
<!-- Optional theme -->
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/semantic.min.css"/>
</head>
<body>

<div style="margin-bottom:10%;" id="navbar-wrapper" class="container">
    <nav style="padding-right:10px;" class="navbar navbar-fixed-top navbar-inverse">
        
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <div class="logo">                    
                        <a style="text-decoration:none; padding-left:3%;padding-bottom:2%;" href="index.php" class="navbar-left"><img src="images/logo.png" width="90" height="60"></a>                    
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul style="padding-top:0.5%; margin-left:1%;" class="nav navbar-nav">
                <li><a href="index.php"><span class = "glyphicon glyphicon-home"></span> &nbsp Home</a></li>
                <li><a href="home.php"><span class = "glyphicon glyphicon-pencil"></span> &nbsp My Posts</a></li>
                <li><a href="addpost.php"><span class = "glyphicon glyphicon-plus"></span> &nbsp Add Post</a></li>                                
                                                              
            </ul>
            <ul style="padding-top:0.5%;" class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a></li>
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
            </ul>
            </div><!--/.nav-collapse -->
        
        </nav>
    </div>
    