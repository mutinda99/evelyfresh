<style>
* {
  box-sizing: border-box;
}

.rows {

  margin-left:-15px;
  margin-right:-15px;
}
  
.columns {
  float: left;
  width: 50%;
  padding: 15px;
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
  border: 14px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>

		
	<body>    
 
	<!-- Navbar
    ================================================== -->
 
	
 
	
	
		
 <div class="rows">
  <div class="columns">
  <h2>Remaining Stock per Shop</h2>
		<table  id="examples" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Shop Name</th>
						
				  		<th>Remaining Stock</th>
						
				  	
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = "SELECT count(serial) as total,shop,count(*) as sum FROM devices_upload du  where du.serial not in(select Phone_serial from device_sales) group by shop  ";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['shop']; ?></td>
					
						<td><?php echo $row['sum']; ?></td>
						
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
				  			<th>Shop Name</th>
				  		
					<th>Remaining Stock</th>
				  	
 
 
				  	</tr>	
				  </tfoot>
				  
				 
		</table>
		  </div>
		  <div class="columns">
		   <h2>Remaining Stock per Device</h2>
		  
		  
		
		<table  id="example" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Phone Model</th>
						
				  		<th>Remaining Stock</th>
						
				  	
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = "SELECT count(serial) as total,model,count(*) as sum FROM devices_upload du  where du.serial not in(select Phone_serial from devices) group by model";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['model']; ?></td>
						
						<td><?php echo $row['sum']; ?></td>
						
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
				  			<th>phone model</th>
				  	
					<th>Remaining Stock</th>
				  	
 
 
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