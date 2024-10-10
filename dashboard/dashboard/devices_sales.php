
 <h2>Devices Sold</h2>
		<table  id="example" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Customer Number</th>
				  		<th>Device Model</th>
						<th>Device Serial</th>
						<th>Amount Sold</th>
						<th>Shop Name</th>
				  		<th>DATE Sold</th>
				  	
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = "SELECT phone_serial,phone_model,DATE_FORMAT(date_activated,'%D-%M-%Y')as date_time,customer_no,amount_paid,shop_name FROM devices where  date_activated LIKE '%{$time}%'";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['customer_no']; ?></td>
						<td><?php echo $row['phone_model']; ?></td>
						<td><?php echo $row['phone_serial']; ?></td>
						<td><?php echo $row['amount_paid']; ?></td>
					    <td><?php echo $row['shop_name']; ?></td>
						<td><?php echo $row['date_time']; ?></td>
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
				  		<th>Customer Number</th>
				  		<th>Device Model</th>
						<th>Device Serial</th>
						<th>Amount Sold</th>
						<th>Shop Name</th>
				  		<th>DATE Sold</th>
				  	
 
 
				  	</tr>	
				  </tfoot>
		</table>

 
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