<!DOCTYPE html>
<?php 
	include 'DbConnect.php';
 
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DEVICE SALES Revenue</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="DEVICE SALES Revenue">
		
 
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
 
	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
		
			<div class="span3 hidden-phone"></div>
		</div>
 
		<table  id="example" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Shop Name</th>
				  		<th>Revenue</th>
						
				  	
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = "SELECT count(ampount_paid) as total,shop_name FROM device group by shop_name";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['shop_name']; ?></td>
						<td><?php echo $row['total']; ?></td>
						
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
				  			<th>Shop Name</th>
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
        autoWidth: false,
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