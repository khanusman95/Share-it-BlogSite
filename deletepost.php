<!-- author: M. Usman Khan-->
<?php
//Displays the data that was received from the input box named name in the form
	$connection = new mysqli('localhost','root','root','blog','8889');

    $query = "DELETE FROM blog_posts WHERE postID =".$_GET['id'];

    if(!mysqli_query($connection,$query)){
        header("Location: index.php");
        exit;
    }
    else{
        header("Location: home.php?action=deleted");
        exit;
    }
?>	