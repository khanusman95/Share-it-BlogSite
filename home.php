<!-- author: M. Usman Khan-->
<?php
    session_start();
    include_once 'dbcon.php';

    if (!isset($_SESSION['userSession'])) {
        header("Location: index.php");
    }

    $query = $DBcon->query("SELECT * FROM blog_members WHERE memberID=".$_SESSION['userSession']);    
    $userRow=$query->fetch_array();
    $query1 = $DBcon->query("SELECT COUNT(postTitle) FROM blog_posts WHERE memberID=".$userRow[0]);
    $post_count= $query1->fetch_array();
    $DBcon->close();
?> 

<?php include "header.php"; ?>
<script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>

<div style="margin-left:10%;margin-right:auto;" id="blog-posts">
    <h1 id="home-heading" style="margin-right:10%;margin-left:auto;margin-bottom:3%; font-size:36pt" class="text-center">Posts By You</h1>
    <?php 
        echo '<h3 style="text-align:center;padding-right:10%;margin-bottom:8%;">You have made&nbsp <span style="font-size:36pt;">'.$post_count[0].'</span>&nbspPost(s)</h3>'
     ?>
    <div class="container">
        
        <div class="row">
            
        <?php            
                $connection = new mysqli('localhost','root','root','blog','8889');
                $sql = "SELECT memberID,postID,postTitle,postDesc,postCont,postDate,field_image FROM blog_posts where memberID =".$_SESSION['userSession'];
                $result = mysqli_query($connection,$sql);

                echo $_GET['delpost'];
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <!--semantic ui9 code -->                                        
                    <div style="height:478px; width:323px;" class="col-md-4">
                    <div class="ui card">            
                    <div style="width:290px !important;height:311px!important;" class="image">
                        <img style="height:311px !important; width:290px !important;" src="<?php echo $row['field_image']; ?>"  />
                    </div>
                    <div class="content">                        
                        <?php echo '<a href="viewpost.php?id='.$row['postID'].'" class="header">'.$row['postTitle'].'</a>'; ?>
                        <div class="meta">
                        <span class="date"><?php echo $row['postDate']; ?></span>
                        </div>
                        <div class="description">
                        <?php echo $row['postDesc']; ?>
                        </div>
                    </div>
                    <div class="extra content">
                        <a href="#">
                        <i class="user icon"></i>
                        read more
                        </a>
                        <button class="btn btn-default">
                            <?php echo '<a href="editpost.php?id='.$row['postID'].'">Edit</a>'  ?>                                                        
                        </button>

                        <form style="display:inline;" action="deletepost.php" method="GET"><input type="hidden" name="id" value=<?php echo '"'.$row['postID'].'"' ?>>
                            <button style="display: inline;" class="btn btn-default" type="submit" value="Submit">Delete</button>
                        </form>

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

<?php include "footer.php"; ?>