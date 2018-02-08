<!-- author: M. Usman Khan-->
<?php
include"head.php";
?>

<?php //include config
session_start();
require_once('dbcon.php');

//if not logged in redirect to login page
if (isset($_SESSION['userSession'])!="") {
    $query = $DBcon->query("SELECT * FROM blog_members WHERE memberID=".$_SESSION['userSession']);
    $userRow=$query->fetch_array();
    $DBcon->close();
       
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

<?php } else{ ?>



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
                <li><a href="register.php"><span class = "glyphicon glyphicon-plus"></span> &nbsp Sign Up</a></li>                                
                                                              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                                
            </ul>
            </div><!--/.nav-collapse -->
        
        </nav>
    </div>
<?php }?>
<?php  
$connection = new mysqli('localhost','root','root','blog','8889');
$stmt = "SELECT m.username,p.memberID,p.postID, p.postTitle, p.postCont, p.postDate FROM blog_posts p, blog_members m WHERE m.memberID = p.memberID AND postID =".$_GET['id'];
$result = mysqli_query($connection,$stmt);
while ($row = mysqli_fetch_array($result)) {

?>


    <div id="view-post">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1> <?php echo $row['postTitle']; ?> </h1>
                    <h3>By: <?php echo $row['username']; ?></h3>
                    <p> <?php echo $row['postDate']; ?> </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h3><?php echo $row['postCont']; ?></h3>
                </div>
            </div>

        </div>
    </div>
    <?php
}?>


<?php include"footer.php";?>