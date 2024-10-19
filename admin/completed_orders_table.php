
<h2>Completed Orders</h2>
		<table  id="example" class="mdl-data-table" style="width:100%">
			<thead>
				  	<tr>
				  		<th>Client</th>
				  		<th>Product</th>
				  		<th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
				  		<th>Order Date</th>
						<th>Order Status</th>
				  		<th>Payment Status</th>
				  		<th>Notes</th>
				  	
 
 
				  	</tr>	
				  </thead>
			<?php
			
				$SQLSELECT = 
                "
        SELECT 
            clients.name AS client_name, 
            products.name AS product_name, 
            category.name AS category_name, 
            orders.quantity, 
            orders.total_price,
            DATE_FORMAT(orders.order_date, '%D-%M-%Y') AS order_date,
            orders.status AS order_status,
            orders.payment_status,
            orders.notes
        FROM 
            orders
        INNER JOIN clients ON orders.client_id = clients.id
        INNER JOIN products ON orders.product = products.id
        INNER JOIN category ON products.id = category.product_id
        WHERE orders.status = 'completed'
        ";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['client_name']; ?></td>
						<td><?php echo $row['product_name']; ?></td>
						<td><?php echo $row['category_name']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
					    <td><?php echo $row['total_price']; ?></td>
						<td><?php echo $row['order_date']; ?></td>
						<td><?php echo $row['order_status']; ?></td>
						<td><?php echo $row['payment_status']; ?></td>
						<td><?php echo $row['notes']; ?></td>
				
					
 
 
					</tr>
				<?php
				}
			?>
			<tfoot>
				  	<tr>
                      <th>Client</th>
				  		<th>Product</th>
				  		<th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
				  		<th>Order Date</th>
						<th>Order Status</th>
				  		<th>Payment Status</th>
				  		<th>Notes</th>
				  	
 
 
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