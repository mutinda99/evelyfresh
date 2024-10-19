
<h2>Completed Orders</h2>
		<table  id="example" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Name</th>
				  		<th>Email</th>
				  		<th>Phone</th>
                      
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = 
                "
        SELECT 
            clients.name, 
            clients.email, 
            clients.phone   
        FROM 
            clients
        ";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
                      <th>Name</th>
				  		<th>Email</th>
				  		<th>Phone</th>
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