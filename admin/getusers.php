<?php
//fetch.php
$connect = mysqli_connect("191.96.56.52", "u982986596_everly_admin", "Ilov3th@t", "u982986596_everly_admin");
$query = "SELECT id, name, phone, email, status FROM clients";
$result = mysqli_query($connect, $query);
$output = array();
while ($row = mysqli_fetch_assoc($result)) {
    $output[] = $row;
}
echo json_encode($output);
