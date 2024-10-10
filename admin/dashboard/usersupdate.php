<?php
//update.php
$connect = mysqli_connect("localhost", "u982986596_devices", "Ilov3th@t", "u982986596_devices");
$query = "
 UPDATE users SET ".$_POST["name"]." = '".$_POST["value"]."' 
 WHERE id = '".$_POST["pk"]."'";
mysqli_query($connect, $query);
?>
