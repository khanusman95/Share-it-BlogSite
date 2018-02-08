<?php include"header.php";?>
<div>This is our upload control</div>

<form name="form" action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto">
    <p>
    <button>Subir archivo</button>
 </form>

<button type="button" name="view" value="Submit">view</button>

 <?php include"footer.php";?>

 <?php
    $connection = new mysqli('localhost','root','root','blog','8889'); 
    $file_get = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];

    $file_to_saved = "dcuments/".$file_get; //Documents folder, should exist in  your host in there you're going to save the file just uploaded
    move_uploaded_file($temp, $file_to_saved);

    echo $file_to_saved;

    $insert_img = mysqli_query($connection,"INSERT INTO `my_table` (field_image) values  ('$file_to_saved')");
    if ($insert_img) {
    # code...
    echo "Img inserted successfully";
    }
    else{
    echo "There is something wrong with this code. Eff!";
    }

 ?>

 <?php
    $connection = new mysqli('localhost','root','root','blog','8889');
    $sql = "SELECT DISTINCT field_image FROM my_table";
    $result = mysqli_query($connection,$sql);

    
    while ($row = mysqli_fetch_array($result)) {
    ?>
    <img src="<?php echo $row['field_image']; ?>" width="150" height="150" />
    <?php  
    }    
    
 ?>

 