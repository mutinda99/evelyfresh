<?php 
include('inc/header.php');
?>
<title>Edit Sales Data</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/ajax.js"></script>	
<?php include('inc/container.php');?>
<div class="container contact">	
	<h2>Edit Sales Data</h2>	
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
				</div>
			</div>
		</div>
		<table id="recordListing" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Customer_Name</th>					
					<th>Mpesa_Code</th>					
					<th>phone_model</th>
					<th>phone_serial</th>
					<th>amount_paid</th>
                    <th>shop_name</th>  
                   				
					<th></th>
					<th></th>					
				</tr>
			</thead>
		</table>
	</div>
	<div id="recordModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="recordForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for="name" class="control-label">Customer Number</label>
							<input type="text" class="form-control" id="customer_no" name="customer_no" placeholder="customer_no" required>			
						</div>
						<div class="form-group">
							<label for="age" class="control-label">Mpesa Code</label>							
							<input type="number" class="form-control" id="mpesa_tid" name="mpesa_tid" placeholder="Mpesa Code">							
						</div>	   	
						<div class="form-group">
							<label for="lastname" class="control-label">Phone Model</label>							
							<input type="text" class="form-control"  id="phone_model" name="phone_model" placeholder="Phone Model" required>							
						</div>	 
						<div class="form-group">
							<label for="lastname" class="control-label">Phone Serial</label>							
							<input type="text" class="form-control"  id="phone_serial" name="phone_serial" placeholder="Phone Serial" required>							
						</div>	
						<div class="form-group">
							<label for="lastname" class="control-label">Amount Paid</label>							
							<input type="text" class="form-control" id="amount_paid" name="amount_paid" placeholder="Amount Paid">			
						</div>	
                                 <div class="form-group">
							<label for="lastname" class="control-label">shop_name</label>							
							<input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="shop_name">			
						</div>						
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	
<?php include('inc/footer.php');?>