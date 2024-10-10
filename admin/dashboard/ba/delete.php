<?php  
 $connect = mysqli_connect("localhost", "root", "", "ajax_live_add_delete");  
 $sql = "DELETE FROM live_records WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>