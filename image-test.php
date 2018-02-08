<?php
    $connection = new mysqli('localhost','root','root','blog','8889');
    $file_get = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];

    $file_to_saved = "avatars/".$file_get; 
    move_uploaded_file($temp, $file_to_saved);
    echo $_FILES['foto']['name'];

    $query = "INSERT INTO `my_table` (field_image) VALUES('$file_to_saved')";
    if($_POST['submit']){
    
        if (!mysqli_query($connection,$query)) {
            echo $file_to_saved;
            header('Location: image-test.php?action=added');
            exit;
            die('Error: ' . mysqli_error($connection));
        }else{
            echo "did not work";
        }
    }
?>
<html>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="foto"/>
            <p><input type="submit" name="submit" value="Submit" value=""></p>
            </form>
        </body>
</html>
