<html>

<head>
  <title>CLIENTS</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>

</head>

<body>
  <div class="container">
    <h1 align="center">Clients</h1>
    <div class="mt-5 mb-3 clearfix">

      <a href="register.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new User</a>
    </div>
    <div class="container">
      <br />

      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">Search</span>
          <input type="text" name="search_text" id="search_text" placeholder="Search by Name" class="form-control" />
        </div>
      </div>
      <br />
      <div id="result"></div>
    </div>

    <br />
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="10%">#</th>
          <th width="40%">Name</th>
          <th width="40%">Phone</th>
          <th width="40%">Email</th>
          <th width="20%">Status</th>
        </tr>
      </thead>
      <tbody id="employee_data">
      </tbody>
    </table>
</body>

</html>




<script type="text/javascript" languvan="javascript">
  $(document).ready(function() {

    function fetch_employee_data() {
      $.ajax({
        url: "getusers.php",
        method: "POST",
        dataType: "json",
        success: function(data) {
          for (var count = 0; count < data.length; count++) {
            var html_data = '<tr><td>' + data[count].id + '</td>';

            html_data += '<td data-name="name" class="name" data-type="text" data-pk="' + data[count].id + '">' + data[count].name + '</td>';

            html_data += '<td data-name="phone" class="phone" data-type="text" data-pk=" ' + data[count].id + '">' + data[count].phone + '</td>';

            html_data += '<td data-name="email" class="email" data-type="text" data-pk="' + data[count].id + '">' + data[count].email + '</td>';

            html_data += '<td data-name="status" class="status" data-type="select" data-pk="' + data[count].id + '">' + data[count].status + '</td></tr>';

            $('#employee_data').append(html_data);
          }
        }
      })
    }

    fetch_employee_data();

    $('#employee_data').editable({
      container: 'body',
      selector: 'td.name',
      url: "usersupdate.php",
      title: 'Name',
      type: "POST",
      //dataType: 'json',
      validate: function(value) {
        if ($.trim(value) == '') {
          return 'This field is required';
        }
      }
    });

    $('#employee_data').editable({
      container: 'body',
      selector: 'td.status',
      url: "usersupdate.php",
      title: 'Status',
      type: "POST",
      dataType: 'json',
      source: [{
        value: "1",
        text: "Active"
      }, {
        value: "2",
        text: "Inactive"
      }],
      validate: function(value) {
        if ($.trim(value) == '') {
          return 'This field is required';
        }
      }
    });

    $('#employee_data').editable({
      container: 'body',
      selector: 'td.phone',
      url: "usersupdate.php",
      title: 'Phone',
      type: "POST",
      dataType: 'json',
      validate: function(value) {
        if ($.trim(value) == '') {
          return 'This field is required';
        }
      }
    });

    $('#employee_data').editable({
      container: 'body',
      selector: 'td.email',
      url: "usersupdate.php",
      title: 'Email',
      type: "POST",
      dataType: 'json',
      validate: function(value) {
        if ($.trim(value) == '') {
          return 'This field is required';
        }
      }
    });

  });
</script>