<!-- author: M. Usman Khan-->
<?php
    session_start();
    include_once 'dbcon.php';

    if (!isset($_SESSION['userSession'])) {
        header("Location: index.php");
    }
    else{
        $connection1 = new mysqli('localhost','root','root','blog','8889');
        date_default_timezone_set('Asia/Karachi');
        date_default_timezone_get();
        $memberID = mysqli_real_escape_string($connection1,$_SESSION['userSession']);
        $postTitle = mysqli_real_escape_string($connection1,$_POST['postTitle']);
        $postDesc = mysqli_real_escape_string($connection1,$_POST['postDesc']);
        $postCont = mysqli_real_escape_string($connection1,$_POST['postCont']);
        $postDate = date('Y-m-d H:i:s');
        $pageid = $_GET['id'];

        $file_get = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];

        $file_to_saved = "dcuments/".$file_get; 
        move_uploaded_file($temp, $file_to_saved);
        echo $file_to_saved;


        $query = "UPDATE blog_posts SET postTitle = '{$postTitle}', postDesc = '{$postDesc}', postCont = '{$postCont}', field_image = '{$file_to_saved}', postDate = '{$postDate}' WHERE postID={$pageid}" ;

        if($_POST['submit']){
    
            if (!mysqli_query($connection1,$query)) {
                header('Location: home.php?action=added');
				exit;
                die('Error: ' . mysqli_error($connection1));
            }
            else{                
                if ($insert_img) {
                # code...
                echo "Img inserted successfully";
                header('Location: home.php?action=added');
				exit;
                }                                
            }

        }                
    }

?>

<?php  
$connection = new mysqli('localhost','root','root','blog','8889');
$stmt = "SELECT m.username,p.memberID,p.postID, p.postTitle,p.postDesc, p.postCont, p.postDate, p.field_image FROM blog_posts p, blog_members m WHERE m.memberID = p.memberID AND postID =".$_GET['id'];
$result = mysqli_query($connection,$stmt);
while ($row = mysqli_fetch_array($result)) {

?>

<?php include"header.php";?>


 <div id="add-post-div">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Edit Post</h1>
                <form name="form" action="" method="POST" enctype="multipart/form-data">

                    <p><label>Title</label><br />
                    <input type="text" name="postTitle" value=<?php echo '"'.$row['postTitle'].'"'; ?>></p>

                    <p><label>Description</label><br />
                    <textarea name="postDesc" cols="60" rows="10" value=""><?php echo $row['postDesc']; ?></textarea></p>

                    <p><label>Content</label><br />
                    <textarea name="postCont" cols="60" rows="10" value=""><?php echo $row['postCont']; ?></textarea></p>

                    <div>This is our upload control</div>

                    
                    <input type="file" name="foto" value="">
                    <p>                                        

                    <p><input type="submit" name="submit" value="Submit"></p>

                </form>
            </div>
        </div>
    </div>
</div>

    
<?php 
}
?>

<?php include"footer.php";?>

