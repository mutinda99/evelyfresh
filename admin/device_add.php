<?php
include 'phpalert.php';

$alert = new PHPAlert();
$servername = "localhost";
$username = "u982986596_devices";
$password = "Ilov3th@t";
$dbname = "u982986596_devices";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['dev_add'])) {
  // receive all input values from the form
  $pname = mysqli_real_escape_string($conn,$_POST['pname']);
  $price = mysqli_real_escape_string($conn,$_POST['pirce']);
 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "replace INTO phones(device_name,device_cost)
VALUES ('$pname', '$price')";



if ($conn->query($sql) === TRUE) {
    //echo "alert('New record created successfully')";
	 $alert->success('New record created successfully');
} else {
  //  echo "Error: " . $sql . "<br>" . $conn->error;
   $alert->error('An Error occured. check details');
}
}



if (isset($_POST['shop_add'])) {
  // receive all input values from the form
  $pname = mysqli_real_escape_string($conn,$_POST['pname']);
  $price = mysqli_real_escape_string($conn,$_POST['pirce']);
 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "replace INTO shops(shop,location)
VALUES ('$pname', '$price')";



if ($conn->query($sql) === TRUE) {
    //echo "alert('New record created successfully')";
	 $alert->success('New record created successfully');
} else {
  //  echo "Error: " . $sql . "<br>" . $conn->error;
   $alert->error('An Error occured. check details');
}
}


//$conn->close();
?>