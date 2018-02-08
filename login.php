<!-- author: M. Usman Khan-->
<?php
session_start();
require_once 'dbcon.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT memberID, email, password FROM blog_members WHERE username='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['memberID'];
		header("Location: home.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?>
<html>
	  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Share It | A blog open to the whole world</title>

		<link rel="stylesheet" href="css/style.css" />

		<script src="js/jquery.min.js"></script>

		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/semantic.min.css"/>
		<!-- Optional theme -->

		<link rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Latest compiled and minified JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
		<link rel="stylesheet" href="css/semantic.min.css"/>
	</head>
	
	<body>

		<!--navbar-->
		<div style="" id="navbar-wrapper" class="container">
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
                <li><a href="register.php"><span class = "glyphicon glyphicon-plus"></span> &nbsp Sign Up</a></li>                                
                                                              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                                
            </ul>
            </div><!--/.nav-collapse -->
        
        </nav>
    </div>
		<!--navbar-->

		<div style="margin-top:5%;" class="text-center" id="heading">
			<img style="display:inline;" src="images/logo.png"/>		
		</div>

<div class="signin-form">

	<div class="container">
      <div class="row">
		  <div class="col-md-6 col-md-offset-3">
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In.</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
            
            <!--<a href="register.php" class="btn btn-default" style="float:right;">Sign UP Here</a>-->
            
        </div>  
        
        
      
      </form>

    </div>
    
</div>
</div>
</div>

<?php include "footer.php" ?>