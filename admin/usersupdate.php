<?php
//update.php
$connect = mysqli_connect("191.96.56.52.", "u982986596_everly_admin", "Ilov3th@t", "u982986596_everly_admin");
$query = "
 UPDATE clients SET " . $_POST["name"] . " = '" . $_POST["value"] . "' 
 WHERE id = '" . $_POST["pk"] . "'";
mysqli_query($connect, $query);
