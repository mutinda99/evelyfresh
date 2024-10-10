

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Device sales</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">COOP TALK</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="upload.php">
            <i class="fa fa-check-square"></i>
            <span class="nav-link-text">Upload Stock Csv</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="product.php">
            <i class="fa-brands fa-wpforms"></i>
            <span class="nav-link-text">Add Device</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="register.php">
            <i class="fa fas fa-user"></i>
            <span class="nav-link-text"> Users</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
         
            <div class="dropdown-divider"></div>
           
            <div class="dropdown-divider"></div>
           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Device Sales</li>
      </ol>
      <!-- Icon Cards-->

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT  count(*) as name from professors ";
if (mysqli_query($conn, $sqll)) 
{
   echo "";
} 
 else 
{
  echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sqll);
if (mysqli_num_rows($result) > 0)
 {
   // output data of each row
   while($row = mysqli_fetch_assoc($result))
 { 
?>

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
               <i class="fa fa-fw fa-mobile"></i>
              </div>
              <div class="mr-5"><?php echo $row['name']; ?> Devices Sold</div>
            </div>
           
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>

          </div>
        </div>

    
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-database"></i>
              </div>
              <div class="mr-5"><?php echo $row['name'];?>  Revenue</div>
            </div>
                 <?php
}
} 
  else
 {
  echo '0 results';
}
?>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Profit</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">Remaining Stock</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  $sqlll = "SELECT count(*) as name from professors"; 
 
  if (mysqli_query($conn, $sqlll))
 {
  echo "";
 } 
else
  { 
   echo "Error: " . $sqlll . "<br>" . mysqli_error($conn);
  }
 
   $result = mysqli_query($conn, $sqlll);
   $number=array();
  if (mysqli_num_rows($result) > 0) 
{
// output data of each row
   while($row = mysqli_fetch_assoc($result))
  { 
   $number[]=$row['name'];
  }
} 
   else
  {
    echo "0 results";
  }
  $number_formated= "[".implode(",",$number)."]";



?>
  <script type="text/javascript"> 
  window.dataf= <?php echo $number_formated; ?>
  </script>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Sales Chart</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
		  <?php  
   
$servername = "localhost";
$username = "root";
$password = "";
$database = "coop";
$mysqli = new mysqli($servername, $username, 
                $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql="select  month(date_activated) as amonth, count(*) as atotal  FROM device GROUP by month(date_activated)";
$sql2="select  month(date_activated) as dmonth, count(*) as dtotal  FROM device GROUP by month(date_activated)";
$sql3="select  shop_name as vans, count(*) as vantotal  from  device   GROUP by shop_name";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql2);
$result3 = $mysqli->query($sql3);
$adata = array();
$ddata = array();
$amonth = array();
$dmonth = array();
$vans = array();
$vant = array();
$mysqli->close(); 
?>
  <script src="vendor/chart.js/Chart.js"></script>
   
<script>
//Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif', Chart.defaults.global.defaultFontColor = "#292b2c";

<?php   // LOOP TILL END OF DATA
            while($rows=$result->fetch_assoc()){
            $adata[] = $rows['atotal'];
            $amonth[] = $rows['amonth'];
            }
        
            while($rows=$result2->fetch_assoc()){
            $ddata[] = $rows['dtotal'];
            }
            
            while($rows=$result3->fetch_assoc()){
            $vans[] = $rows['vans'];
            $vant[] = $rows['vantotal'];
            }
        ?>
 const aagle = <?php echo json_encode($adata);?>;
		 console.log(aagle)
        const digitex = <?php echo json_encode($ddata);?>;
        const month = <?php echo json_encode($amonth);?>;
		console.log(month)
        const vans = <?php echo json_encode($vans);?>;
        const vant = <?php echo json_encode($vant);?>;

// -- Area Chart Example


var ctx = document.getElementById("myAreaChart");
		
 
var myLineChart = new Chart(document.getElementById("myAreaChart"), {
  type: 'line',
  data: {
    labels: month,
    datasets: [{
      label: "sales",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 20,
      pointBorderWidth: 2,
      data: aagle
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 200,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});


</script>
         
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Device Sales</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th>ID</th>
                  <th>Name of Product</th>
                  <th>Price of Product</th>
                  <th>Product Catrogy</th>
                  <th>Product Details</th> 
                </tr>
              </thead>
              <tfoot>

                <tr>
                  <th>ID</th>
                  <th>Name of Product</th>
                  <th>Price of Product</th>
                  <th>Product Catrogy</th>
                  <th>Product Details</th> 
                </tr>
              </tfoot>
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = 'SELECT * from professors';
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$count=1;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                           <tr>
                              <th>
                              <?php echo $row['name']; ?>
                              </th>
                              <td>
                              <?php echo $row['Id_no']; ?>
                              </td>
                              <td>
                              <?php echo $row['van']; ?>
                              </td>
                              <td>
                              <?php echo $row['loc']; ?>
                              </td>
                              <td>
                              <?php echo $row['mobi']; ?>
                              </td>
                           </tr>
                        </tbody>

                        <?php
$count++;
}
} else {
echo '0 results';
}
?>
              
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>SmartechKE systems</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <!-- <script src="js/sb-admin-charts.js"></script> 

  </div>
</body>

</html>
