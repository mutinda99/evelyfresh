<style>
* {
  box-sizing: border-box;
}

.rows {
display: flex;
  margin-left:-5px;
  margin-right:-5px;
}
  
.columns {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.rows::after {
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

		
	<body>    
 
	<!-- Navbar
    ================================================== -->
 
	
 
	
	
		
 <div class="rows">
  <div class="columns">
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
		  <div class="columns">
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