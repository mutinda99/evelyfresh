<?php
include 'phpalert.php';

$alert = new PHPAlert();
$servername = "191.96.56.52";
$username = "u982986596_everly_admin";
$password = "Ilov3th@t";
$dbname = "u982986596_everly_admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['reg_p'])) {
  // receive all input values from the form
  $pname = mysqli_real_escape_string($conn,$_POST['Dname']);
  $price = mysqli_real_escape_string($conn,$_POST['Dprice']);
  $pcat = mysqli_real_escape_string($conn,$_POST['Dserial']);
  $product_details = mysqli_real_escape_string($conn,$_POST['Dshop']);
   //$amount = mysqli_real_escape_string($conn,$_POST['Damount']);
   
	 $customer = mysqli_real_escape_string($conn,$_POST['Dcustomer']);
	  $mpesa = mysqli_real_escape_string($conn,$_POST['Dmpesa']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $user_check_query = "SELECT * FROM device_sales WHERE mpesa_tid='$mpesa' || phone_serial='$pcat' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // if user exists
  if ($user) { 
    if ($user['mpesa_tid'] === $mpesa) {
     // array_push($errors, "mpesa code already exists");
	   $alert->error('Mpesa code Exists. ');
    }
	if ($user['phone_serial'] === $pcat) {
     // array_push($errors, "mpesa code already exists");
	   $alert->error('Serial entered has already been sold. ');
    }
	
  }
else{
  


$sql = "insert INTO device_sales (customer_no,mpesa_tid,phone_model,phone_serial,amount_paid,shop_name)
VALUES ('$customer', '$mpesa', '$pname','$pcat','$price','$product_details')";



if ($conn->query($sql) === TRUE) {
    //echo "alert('New record created successfully')";
	 $alert->success('New record created successfully');
} else {
  //  echo "Error: " . $sql . "<br>" . $conn->error;
   $alert->error('An Error occured. check details');
}

}
}
$conn->close();
?>