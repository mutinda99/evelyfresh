<html>
 <head>
  <title>EDIT BAS RECORDS</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
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

  <div class="container">
   <h1 align="center">Edit BAS RECORDS</h1>
    <div class="mt-5 mb-3 clearfix">
                     
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new BA</a>
                    </div>
					  <div class="container">
   <br />
  
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by BA Name" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
					
   <br />
   <table id="example" class="table table-bordered table-striped">
    <thead>
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
    </thead>
    <tbody id="employee_data">
    </tbody>
   </table>
 </body>
</html>



<script type="text/javascript" languvan="javascript" >
$(document).ready(function(){
	
	
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
 
 function fetch_employee_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   dataType:"json",
   success:function(data)
   {
    for(var count=0; count<data.length; count++)
    {
     var html_data = '<tr><td>'+data[count].id+'</td>';
	  html_data += '<td data-name="mobi" class="mobi" data-type="text" data-pk="'+data[count].id+'">'+data[count].mobi+'</td>';
	   html_data += '<td data-name="name" class="name" data-type="text" data-pk="'+data[count].id+'">'+data[count].name+'</td>';
	     html_data += '<td data-name="Id_no" class="Id_no" data-type="text" data-pk="'+data[count].id+'">'+data[count].Id_no+'</td>';
		 html_data += '<td data-name="phone" class="phone" data-type="text" data-pk="'+data[count].id+'">'+data[count].phone+'</td>';
		 html_data += '<td data-name="company" class="company" data-type="text" data-pk="'+data[count].id+'">'+data[count].company+'</td>';
		 html_data += '<td data-name="van" class="van" data-type="text" data-pk="'+data[count].id+'">'+data[count].van+'</td>';
		 html_data += '<td data-name="loc" class="loc" data-type="text" data-pk="'+data[count].id+'">'+data[count].loc+'</td>';
	 html_data += '<td data-name="status" class="status" data-type="select" data-pk="'+data[count].id+'">'+data[count].status+'</td></tr>';
	 
     $('#employee_data').append(html_data);
    }
   }
  })
 }
 
 fetch_employee_data();
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.name',
  url: "update.php",
  title: 'BAs Name',
  type: "POST",
  //dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.status',
  url: "update.php",
  title: 'status',
  type: "POST",
  dataType: 'json',
  source: [{value: "1", text: "Active"}, {value: "2", text: "Inactive"}],
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.van',
  url: "update.php",
  title: 'van',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.loc',
  url: "update.php",
  title: 'location',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 

 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.phone',
  url: "update.php",
  title: 'phone',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.Id_no',
  url: "update.php",
  title: 'ID Number',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 $('#employee_data').editable({
  container: 'body',
  selector: 'td.mobi',
  url: "update.php",
  title: 'Mobi Go',
  type: "POST",
  dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });
 
 
 
});
</script>