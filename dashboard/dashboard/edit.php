<!DOCTYPE html>
<?php
  
// Username is root
$user = 'root';
$password = ''; 
  
// Database name is gfg
$database = 'coop'; 
  
// Server is localhost with
// port number 3308
$servername='localhost';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
//$sql = "SELECT * FROM movies where company='aagle' ";
$sql2 = "SELECT * FROM professors";
//$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql2);
$mysqli->close(); 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
     <!--Import jQuery before export.js-->
     
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
     
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
   


    <!--Data Table-->
    <script type="text/javascript"  src=" https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"  src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
        


	    

    <!--Export table buttons-->
  

<!--Export table button CSS-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>






	

    
   
</head>


<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                    </div>
               
                    
                    <table id="br" class="table table-striped table-bordered" style="width:80%">
		<thead>
            <tr>
                <th>MOBI</th>
                <th>NAME</th>
                <th>ID NO</th>
                 <th>PHONE</th>
                 <th>VAN</th>
				<th>LOCATION</th>
				<th>Status</th>
				<th>Action</th>
              
                
            </tr>
			</thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result2->fetch_assoc())
                {
             ?>
		
			 
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
					
                <td><?php echo $rows['mobi'];?></td>
                <td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['Id_no'];?></td>
				<td><?php echo $rows['phone'];?></td>
				<td><?php echo $rows['van'];?></td>
                <td><?php echo $rows['loc'];?></td>
				<td>
				<?php echo $rows['loc'];?><input type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger"></td>
                <td>
                                        

                                            <a href="update.php?id='. $rows['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                            <a href="delete.php?id='. $rows['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
											<!-- Default checked -->

                                        </td>
             
               
            </tr>
				
			 
            <?php
                }
             ?>
             <tfoot>
            <tr>
                <th>MOBI</th>
                <th>NAME</th>
                <th>ID NO</th>
                 <th>PHONE</th>
                 <th>VAN</th>
				<th>LOCATION</th>
				<th>Status</th>
				<th>Action</th>
              
                
            </tr>
			</tfoot>
			
			  
        </table>

       
                     
                </div>
                <script> 
		
	$(document).ready( function () {
    
	
		 $('#br').DataTable( {
		     
       autoWidth: true,
       "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
       
        
    } );
		  $('#br').on('click', 'tr', function(e){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
         var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
         var col3=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value
         var data=col1+"\n"+col2+"\n"+col3;
         
        // alert(col3);
		  createCookie("height", +col3, "10");
		//$( "#br" ).load( "van.php #br" );
    });
});


</script>
            </div>        
        </div>
    </div>
    
</body>
</html>