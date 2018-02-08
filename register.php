<!-- author: M. Usman Khan-->
<?php
include"head.php";
?>
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
                <li><a href="login.php"><span class = "glyphicon glyphicon-home"></span> &nbsp Login</a></li>                                                                                              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                                
            </ul>
            </div><!--/.nav-collapse -->
        
        </nav>
    </div>

	<!---mage file code for copying-->

	<!---image file code-->
<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}
require_once 'dbcon.php';

if(isset($_POST['btn-signup'])) {
	
	$uname = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	
	$uname = $DBcon->real_escape_string($uname);
	$email = $DBcon->real_escape_string($email);
	$upass = $DBcon->real_escape_string($upass);
	
	
	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
	
	$check_email = $DBcon->query("SELECT email, username FROM blog_members WHERE email='$email' OR username= '$uname'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO blog_members(memberID,username,password,email) VALUES(NULL,'$uname','$hashed_password','$email')";

		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
		
	} else {
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			
	}
	
	$DBcon->close();
}
?>



<div class="signin-form">

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
        
       <form class="form-signin" method="post" id="register-form" enctype="multipart/form-data">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
            echo $_SESSION['userSession'];
		}
		?>
          
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" required pattern="^[-\w\.\$@\*\!]{1,30}$" title="Username cannot contain ',' or spaces"  />
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input id="txtNewPassword" type="password" class="form-control" placeholder="Password" name="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" data-toggle="tooltip" title="Password must contain 8 characters with atleast 1 Uppercase Alphabet, 1 lowercase alphabet and 1 numeric digit" />
        </div>

		 <div class="form-group">
        <input id="txtConfirmPassword" type="password" class="form-control" placeholder="Confirm Password" name="conf-password" required onChange="checkPasswordMatch(); " />
        </div>

		<div class="registrationFormAlert" id="divCheckPasswordMatch"></div>

		
     	<hr />
        
        <div class="form-group">
            <button id="btn_submit" type="submit" class="btn btn-default" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
            <a href="login.php" class="btn btn-default" style="float:right;">Log In Here</a>
        </div> 
      
      </form>

    	</div>
    </div>
</div>

<script>
function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword){
        $("#divCheckPasswordMatch").html("Passwords do not match!");
		 $('#btn_submit').attr('disabled',true);
    	this.submit();
	}
    else{
        $("#divCheckPasswordMatch").html("Passwords match.");
		$('#btn_submit').attr('disabled',false);
    	this.submit();
		}
}

</script>

<script>
$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>


<?php include "footer.php"; ?>