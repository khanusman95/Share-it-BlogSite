<!--author: M. Usman Khan-->
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
                <li><a href="login.php"><span class = "glyphicon glyphicon-user"></span> &nbsp Login</a></li>
                <li><a href="register.php"><span class = "glyphicon glyphicon-plus"></span> &nbsp Sign Up</a></li>                                
                                                              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                                
            </ul>
            </div><!--/.nav-collapse -->
        
        </nav>
    </div>
<?php }?>

    <div style="margin-bottom:8%;background:url('images/bb1.jpg'); min-height:600px; background-position:center;" id="jumbo"class="text-center">
        <h1 style="color:white; padding-top:20%; font-size:42pt;" > Share Anything With The <br> Whole World! </h1>
        <h1 style="color:white;"> Start Posting Now!</h3>
        <a href="register.php"><button id="call-to-action" type="button" class="btn btn-default" style="font-size:24pt; color:#2d2d2d;">Get Started!</button></a>
    </div>

        <div style="margin-left:10%;margin-right:auto;" id="blog-posts" class="text-center">
            <div class="container">
                <div class="row">
                <?php            
                $connection = new mysqli('localhost','root','root','blog','8889');
                $sql = "SELECT m.username,p.memberID,p.postID, p.postTitle,p.postDesc, p.postCont, p.postDate, p.field_image FROM blog_posts p, blog_members m WHERE m.memberID = p.memberID ORDER BY p.postDate desc";
                $result = mysqli_query($connection,$sql);

                
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <!--semantic ui9 code -->                                        
                    <div style="height:478px; width:323px;margin-bottom:5%;" class="col-md-4">
                    <div class="ui card">            
                    <div style="width:290px !important;height:311px!important;" class="image">
                        <img style="height:311px !important; width:290px !important;" src="<?php echo $row['field_image']; ?>"  />
                    </div>
                    <div class="content">                        
                        <?php echo '<a href="viewpost.php?id='.$row['postID'].'" class="header">'.$row['postTitle'].'</a>'; ?>
                        <div class="meta">
                        <span class="date"><?php echo $row['postDate']; ?></span>
                        </div>
                        <div class="meta">
                            By:<span class="date"><?php echo $row['username']; ?></span>
                        </div>
                        <div class="description">
                        <?php echo $row['postDesc']; ?>
                        </div>
                    </div>
                    <div class="extra content">
                        <?php echo '<a href="viewpost.php?id='.$row['postID'].'">'; ?>
                        <i class="user icon"></i>
                        read more
                        </a>
                        
                    </div>
                    </div><br>
                    </div>                    
                        <!--semantic ui9 code -->
                <?php  
                }    
                
            ?>  
            </div>
    </div>
</div>


<?php
include"footer.php";
?>