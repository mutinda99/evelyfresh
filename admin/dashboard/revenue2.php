<!DOCTYPE html>
<?php 
	include 'DbConnect.php';
	session_start();

// Check if the user is logged in, if not then redirect him to login page

//session_start();
 if(!isset($_SESSION["hmonth"])){
    header("location: fetch2error.php");
    exit;
}

 echo "Month " . $_SESSION["hmonth"] . ".<br>";
 $time= $_SESSION["hmonth"];
 
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DEVICE SALES Revenue</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="DEVICE SALES Revenue">
		<style>
* {
  box-sizing: border-box;
}

.row {

  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.material.min.css">
	<!--	<link rel="stylesheet" href="css/bootstrap-custom.css"> -->
		
	
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
     
     
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.material.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

 
	</head>
	<body>    
 
	<!-- Navbar
    ================================================== -->
 
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php">GO BACK</a>
						  
 
			</div>
		</div>
	</div>
 
	
	
		
 <div class="row">
  <div class="column">
  <h2>Revenue per Shop</h2>
		<table  id="examples" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Shop Name</th>
						<th>Devices Sold</th>
				  		<th>Revenue</th>
						
				  	
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = "SELECT count(amount_paid) as total,shop_name,sum(amount_paid) as sum FROM device_sales where date_activated LIKE '%{$time}%' group by shop_name  ";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['shop_name']; ?></td>
						<td><?php echo $row['total']; ?></td>
						<td><?php echo $row['sum']; ?></td>
						
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
				  			<th>Shop Name</th>
				  		<th>Devices Sold</th>
					<th>Revenue</th>
				  	
 
 
				  	</tr>	
				  </tfoot>
				  
				 
		</table>
		  </div>
		  <div class="column">
		   <h2>Revenue per Device</h2>
		  
		  
		
		<table  id="example" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Phone Model</th>
						<th>Devices Sold</th>
				  		<th>Revenue</th>
						
				  	
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = "SELECT count(amount_paid) as total,phone_model,sum(amount_paid) as sum FROM device_sales where date_activated LIKE '%{$time}%' group by phone_model";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['phone_model']; ?></td>
						<td><?php echo $row['total']; ?></td>
						<td><?php echo $row['sum']; ?></td>
						
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
				  			<th>phone model</th>
				  		<th>Devices Sold</th>
					<th>Revenue</th>
				  	
 
 
				  	</tr>	
				  </tfoot>
		</table>
		
  </div>
    </div>
 
	
 
 	<script> 
$(document).ready(function () {
    $('#example').DataTable({
        dom: 'Bfrtip',
		pageLength : 5,
        autoWidth: true,
        columnDefs: [
            {
                targets: ['_all'],
                className: 'mdc-data-table__cell',
            },
        ],
        buttons: [
            {
                extend: 'pdfHtml5',
               
            }
        ]
          
       
    });
});

</script>
<script> 
$(document).ready(function () {
    $('#examples').DataTable({
        dom: 'Bfrtip',
		pageLength : 5,
        autoWidth: true,
        columnDefs: [
            {
                targets: ['_all'],
                className: 'mdc-data-table__cell',
            },
        ],
        buttons: [
            {
                extend: 'pdfHtml5',
               
            }
        ]
          
       
    });
});

</script>

	</body>
</html>