<?php
include"head.php";
?>

<?php //include config
session_start();
require_once('dbcon.php');

//if not logged in redirect to login page
if (isset($_SESSION['userSession'])!="") {
       
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
            <a class="navbar-brand" href="home.php">Share It</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php"><span class = "glyphicon glyphicon-home"></span> &nbsp Home</a></li>
                <li><a href="addpost.php"><span class = "glyphicon glyphicon-plus"></span> &nbsp Add Post</a></li>                                
                                                              
            </ul>
            <ul class="nav navbar-nav navbar-right">
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
            <a class="navbar-brand" href="home.php">Share It</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="login.php"><span class = "glyphicon glyphicon-home"></span> &nbsp Login</a></li>
                <li><a href="register.php"><span class = "glyphicon glyphicon-plus"></span> &nbsp Sign Up</a></li>                                
                                                              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                                
            </ul>
            </div><!--/.nav-collapse -->
        
        </nav>
    </div>
<?php }?>

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
                    <div style="height:478px; width:323px;margin-bottom:3%;" class="col-md-4">
                    <div class="ui card">            
                    <div style="width:290px !important;height:311px!important;" class="image">
                        <img src="<?php echo $row['field_image']; ?>"  />
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