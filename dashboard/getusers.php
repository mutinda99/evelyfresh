<?php
//fetch.php
$connect = mysqli_connect("localhost", "u982986596_devices", "Ilov3th@t", "u982986596_devices");
$query = "SELECT id, username,shop_name,status FROM users";
$result = mysqli_query($connect, $query);
$output = array();
while($row = mysqli_fetch_assoc($result))
{
 $output[] = $row;
}
echo json_encode($output);
?>
