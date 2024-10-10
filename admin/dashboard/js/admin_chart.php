// Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// -- Area Chart Example

var ctx = document.getElementById("myAreaChart");
<?php  
   
$servername = "localhost";
$username = "root";
$password = "";
$database = "device";
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
 
var myLineChart = new Chart(ctx, {
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
          unit: 'date'
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
          max: 40000,
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
// -- Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [4215, 5312, 6251, 7841, 9821, 14984],
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
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
// -- Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Blue", "Red", "Yellow", "Green"],
    datasets: [{
      data: [12.21, 15.58, 11.25, 8.32],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
});
