<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "coop");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM professors 
  WHERE name LIKE '%".$search."%'
  OR mobi LIKE '%".$search."%' 
  OR van LIKE '%".$search."%' 
  OR loc LIKE '%".$search."%' 
  OR Id_no LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM professors ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
   <tr>
	 <th width="10%">#</th>
      <th width="10%">MOBI</th>
      <th width="40%">Name</th>
      <th width="10%">ID_NO</th>
      <th width="30%">PHONE</th>
      <th width="10%">COMPANY</th>
	   <th width="10%">VAN</th>
	    <th width="10%">LOC</th>
		<th width="10%">STATUS</th>
     </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["mobi"].'</td>
    <td>'.$row["name"].'</td>
    <td>'.$row["Id_no"].'</td>
    <td>'.$row["phone"].'</td>
	<td>'.$row["company"].'</td>
	<td>'.$row["van"].'</td>
	<td>'.$row["loc"].'</td>
	<td>'.$row["status"].'</td>
   </tr>
  ';
 }
 //echo $output;
  echo json_encode($output);
}
else
{
 echo 'Data Not Found';
}
?>
