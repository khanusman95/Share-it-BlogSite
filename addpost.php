<!-- author : M. Usman Khan-->
<?php
    session_start();
    include_once 'dbcon.php';

    if (!isset($_SESSION['userSession'])) {
        header("Location: index.php");
    }
    else{
        $connection = new mysqli('localhost','root','root','blog','8889');
        date_default_timezone_set('Asia/Karachi');
        date_default_timezone_get();
        $memberID = mysqli_real_escape_string($connection,$_SESSION['userSession']);
        $postTitle = mysqli_real_escape_string($connection,$_POST['postTitle']);
        $postDesc = mysqli_real_escape_string($connection,$_POST['postDesc']);
        $postCont = mysqli_real_escape_string($connection,$_POST['postCont']);
        $postDate = date('Y-m-d H:i:s');

        $file_get = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];

        $file_to_saved = "dcuments/".$file_get; 
        move_uploaded_file($temp, $file_to_saved);
        echo $file_to_saved;


        $query = "INSERT INTO `blog_posts` (memberID,postID,postTitle,postDesc,postCont,postDate,field_image) VALUES($memberID,NULL,'$postTitle','$postDesc','$postCont','$postDate','$file_to_saved')";

        if($_POST['submit']){
    
            if (!mysqli_query($connection,$query)) {
                header('Location: home.php?action=added');
				exit;
                die('Error: ' . mysqli_error($connection));
            }
            else{
                if ($insert_img) {
                # code...
                echo "Img inserted successfully";
                }
                else{
                echo "There is something wrong with this code. Eff!";
                }
                $result = '<div class = "alert alert-success">Form Submitted Successfully</div>';
            }

        }                
    }

?>


<?php include"header.php"; ?>

<div id="add-post-div">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 style="font-size:36pt;margin-bottom:8%" class="text-center">Add a New Post</h1>
                <form name="form" action="" method="POST" enctype="multipart/form-data">

                    <p><label>Title</label><br />
                    <input class="form-control" type="text" name="postTitle" value=""></p>

                    <p><label>Description</label><br />
                    <textarea id="description" class="form-control" name="postDesc" cols="60" rows="10" maxlength="50" value=""></textarea></p>
                    <p id="bad_notice_desc"></p>

                    <p><label>Content</label><br />
                    <textarea id="content" class="form-control" name="postCont" cols="60" rows="10" value=""></textarea></p>
                    <p id="bad_notice_con"></p>

                    <div>Upload a cover image: </div>

                    
                    <input id="picture" class="form-control" type="file" name="foto">
                    <p>                                        

                    <p>
                        <input style="height:0.1px; width:0px;background-color:white; border:none; z-index:-1;margin:0; padding:0;" id="somebutton" type="button" value="somebutton"/>
                        <input style="border: 1px solid #5cb85c; border-radius:5px; padding:5px; width:150px;" class="btn-success" id="btn-submit" type="submit" name="submit" value="Submit" value="">
                        <a href="home.php"><input style="float:right; border: 1px solid #5cb85c; border-radius:5px; padding:5px; width:150px;" class="btn-danger" id="btn-cancel" type="button" value="Cancel"/></a> 
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
          tinymce.init({
              selector: "#description",
              setup: function(editor){

                  editor.on('focus',function(){
                    var bad_words=new Array("kill","murder","death");
                    var check_text= tinymce.get('description').getContent(); //document.getElementById("text").value;
                    var error=0;
                    for(var i=0;i<bad_words.length;i++)
                    {
                    var val=bad_words[i];
                    if((check_text.toLowerCase()).indexOf(val.toString())>-1)
                    {
                    error=error+1;
                    }
                    }

                    if(error>0)
                    {
                        $("#btn-submit").attr("disabled", "disabled");                        
                        document.getElementById("bad_notice_desc").innerHTML='<div class="alert alert-danger"><strong>Danger!</strong>Some bad words in your text. Revise text to submit</div>';
                    }
                    else
                    {
                        $("#btn-submit").removeAttr("disabled");                         
                        document.getElementById("bad_notice_desc").innerHTML="";
                    }
                  });

                  editor.on('blur',function(){
                    var bad_words=new Array("death","kill","murder");
                    var check_text= tinymce.get('description').getContent(); //document.getElementById("text").value;
                    var error=0;
                    for(var i=0;i<bad_words.length;i++)
                    {
                    var val=bad_words[i];
                    if((check_text.toLowerCase()).indexOf(val.toString())>-1)
                    {
                    error=error+1;
                    }
                    }

                    if(error>0)
                    {
                        $("#btn-submit").attr("disabled", "disabled");                        
                        document.getElementById("bad_notice_desc").innerHTML='<div class="alert alert-danger"><strong>Danger!</strong>Some bad words in your text. Revise text to submit</div>';
                    }
                    else
                    {
                        $("#btn-submit").removeAttr("disabled");                         
                        document.getElementById("bad_notice_desc").innerHTML="";
                    }
                  });                
              },
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor tabfocus",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
              tabfocus_elements: "content"
          });
  </script>
  <script>
          tinymce.init({
              selector: "#content",
              setup: function(editor){

                  editor.on('focus',function(){
                    var bad_words=new Array("death","kill","murder");
                    var check_text= tinymce.get('content').getContent(); //document.getElementById("text").value;
                    var error=0;
                    for(var i=0;i<bad_words.length;i++)
                    {
                    var val=bad_words[i];
                    if((check_text.toLowerCase()).indexOf(val.toString())>-1)
                    {
                    error=error+1;
                    }
                    }

                    if(error>0)
                    {
                        $("#btn-submit").attr("disabled", "disabled");                        
                        document.getElementById("bad_notice_con").innerHTML='<div class="alert alert-danger"><strong>Danger!</strong>Some bad words in your text. Revise text to submit</div>';
                    }
                    else
                    {
                        $("#btn-submit").removeAttr("disabled");                         
                        document.getElementById("bad_notice_con").innerHTML="";
                    }
                  });            

                  editor.on('blur',function(){
                    var bad_words=new Array("death","kill","murder");
                    var check_text= tinymce.get('content').getContent(); //document.getElementById("text").value;
                    var error=0;
                    for(var i=0;i<bad_words.length;i++)
                    {
                    var val=bad_words[i];
                    if((check_text.toLowerCase()).indexOf(val.toString())>-1)
                    {
                    error=error+1;
                    }
                    }

                    if(error>0)
                    {
                        $("#btn-submit").attr("disabled", "disabled");                        
                        document.getElementById("bad_notice_con").innerHTML='<div class="alert alert-danger"><strong>Danger!</strong>Some bad words in your text. Revise text to submit</div>';
                    }
                    else
                    {
                        $("#btn-submit").removeAttr("disabled");                         
                        document.getElementById("bad_notice_con").innerHTML="";
                    }
                  });                
              },
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor tabfocus",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
              tabfocus_elements: "picture"
          });
  </script>
  


<?php include "footer.php";?>