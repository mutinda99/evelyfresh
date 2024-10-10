<?php
include 'phpalert.php';

$alert = new PHPAlert();
$servername = "localhost";
$username = "u982986596_devices";
$password = "Ilov3th@t";
$dbname = "u982986596_devices";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['reg_p'])) {
  // receive all input values from the form
  $pname = mysqli_real_escape_string($conn,$_POST['Dname']);
  $price = mysqli_real_escape_string($conn,$_POST['Dprice']);
  $pcat = mysqli_real_escape_string($conn,$_POST['Dserial']);
  $product_details = mysqli_real_escape_string($conn,$_POST['Dshop']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "replace INTO devices_upload (serial,model,device_price,shop)
VALUES ('$pcat', '$pname', '$price','$product_details')";



if ($conn->query($sql) === TRUE) {
    //echo "alert('New record created successfully')";
	 $alert->success('New record created successfully');
} else {
  //  echo "Error: " . $sql . "<br>" . $conn->error;
   $alert->error('An Error occured. check details');
}
}

$conn->close();
?>