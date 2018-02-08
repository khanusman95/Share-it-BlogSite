<!-- author: M. Usman Khan-->
<?php

	 $DBhost = "localhost";
	 $DBuser = "root";
	 $DBpass = "root";
	 $DBname = "blog";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname,'8889');
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }

?>