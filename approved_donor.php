<!DOCTYPE html>
<style>
 .btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
 .btn-primary {
    background-color: #337ab7;
    color: #ffffff;
  }
  
 .btn-primary:hover {
    background-color: #23527c;
  }
  
 .btn-danger {
    background-color: #d9534f;
    color: #ffffff;
  }
  
 .btn-danger:hover {
    background-color: #c9302c;
  }
  
 .btn-success {
    background-color: #5cb85c;
    color: #ffffff;
  }
  
 .btn-success:hover {
    background-color: #449d44;
  }
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="logo.jpg" alt="">
            </div>

            <span class="logo_name">RedCross</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="homepage.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
				<li><a href="form.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Form</span>
                </a></li>
                <li><a href="reject.php">
                    <i class="uil uil-ban"></i>
                    <span class="link-name">Rejected</span>
                </a></li>
                <li><a href="approved_donor.php">
                     <i class="uil uil-check"></i>
                    <span class="link-name">Approved</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                <i class="uil uil-analytics"></i>
                <span class="text">Analytics</span>
                </div>
				

                <div class="boxes">
                    <div class="box box1">
                        <?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'bdds';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Query to count each gender
$sql = "SELECT gender, COUNT(*) AS count FROM approved_donors GROUP BY gender";
$result = mysqli_query($conn, $sql);

// Create an array to store the gender counts
$gender_counts = array();

// Loop through the results and store the counts in the array
while ($row = mysqli_fetch_assoc($result)) {
    $gender_counts[$row['gender']] = $row['count'];
}

// Close connection
mysqli_close($conn);

// Create a pie chart using the data
$chart_data = array(
    'Male' => isset($gender_counts['Male'])? $gender_counts['Male'] : 0,
    'Female' => isset($gender_counts['Female'])? $gender_counts['Female'] : 0,
    'Other' => isset($gender_counts['Other'])? $gender_counts['Other'] : 0
);

// Create a pie chart using a library like Google Charts
echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
echo '<script type="text/javascript">';
echo 'google.charts.load("current", {packages:["corechart"]});';
echo 'google.charts.setOnLoadCallback(drawChart);';
echo 'function drawChart() {';
echo 'var data = google.visualization.arrayToDataTable([';
echo '["Gender", "Count"],';
echo '["Male", '. $chart_data['Male']. '],';
echo '["Female", '. $chart_data['Female']. '],';
echo '["Other", '. $chart_data['Other']. '],';
echo ']);';
echo 'var options = {title: "Gender Distribution"};';
echo 'var chart = new google.visualization.PieChart(document.getElementById("piechart"));';
echo 'chart.draw(data, options);';
echo '}';
echo '</script>';
echo '<h2>Gender Distribution</h2>';
echo '<div id="piechart" style="width: 480px; height: 300px;"></div>';
?>
                    </div>
                    <div class="box box2">
                        <?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'bdds';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Query to count each blood type
$sql = "SELECT blood_type, COUNT(*) AS count FROM approved_donors GROUP BY blood_type";
$result = mysqli_query($conn, $sql);

// Create an array to store the blood type counts
$blood_type_counts = array();

// Loop through the results and store the counts in the array
while ($row = mysqli_fetch_assoc($result)) {
    $blood_type_counts[$row['blood_type']] = $row['count'];
}

// Close connection
mysqli_close($conn);

// Create a bar graph using the data
$chart_data = array(
    'A+' => isset($blood_type_counts['A+'])? $blood_type_counts['A+'] : 0,
    'A-' => isset($blood_type_counts['A-'])? $blood_type_counts['A-'] : 0,
    'B+' => isset($blood_type_counts['B+'])? $blood_type_counts['B+'] : 0,
    'B-' => isset($blood_type_counts['B-'])? $blood_type_counts['B-'] : 0,
    'AB+' => isset($blood_type_counts['AB+'])? $blood_type_counts['AB+'] : 0,
    'AB-' => isset($blood_type_counts['AB-'])? $blood_type_counts['AB-'] : 0,
    'O+' => isset($blood_type_counts['O+'])? $blood_type_counts['O+'] : 0,
    'O-' => isset($blood_type_counts['O-'])? $blood_type_counts['O-'] : 0
);

// Create a bar graph using a library like Google Charts
echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
echo '<script type="text/javascript">';
echo 'google.charts.load("current", {packages:["corechart"]});';
echo 'google.charts.setOnLoadCallback(drawChart);';
echo 'function drawChart() {';
echo 'var data = google.visualization.arrayToDataTable([';
echo '["Blood Type", "Count"],';
echo '["A+", '. $chart_data['A+']. '],';
echo '["A-", '. $chart_data['A-']. '],';
echo '["B+", '. $chart_data['B+']. '],';
echo '["B-", '. $chart_data['B-']. '],';
echo '["AB+", '. $chart_data['AB+']. '],';
echo '["AB-", '. $chart_data['AB-']. '],';
echo '["O+", '. $chart_data['O+']. '],';
echo '["O-", '. $chart_data['O-']. '],';
echo ']);';
echo 'var options = {';
echo 'title: "Blood Type Distribution",';
echo 'legend: { position: "none" },';
echo 'chartArea: { width: "50%", height: "70%" },';
echo 'hAxis: { title: "Blood Type", titleTextStyle: { color: "black" } },';
echo 'vAxis: { title: "Count", titleTextStyle: { color: "black" } },';
echo '};';
echo 'var chart = new google.visualization.ColumnChart(document.getElementById("barchart"));';
echo 'chart.draw(data, options);';
echo '}';
echo '</script>';
echo '<h2>Blood Type Distribution</h2>';
echo '<div id="barchart" style="width: 500px; height: 300px;"></div>';
?>
                    </div>
                    <div class="box box3">
                        <?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'bdds';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Query to count each date of registration
$sql = "SELECT DATE(date_of_registration) AS date, COUNT(*) AS count FROM approved_donors GROUP BY DATE(date_of_registration)";
$result = mysqli_query($conn, $sql);

// Create an array to store the date counts
$date_counts = array();

// Loop through the results and store the counts in the array
while ($row = mysqli_fetch_assoc($result)) {
    $date_counts[$row['date']] = $row['count'];
}

// Close connection
mysqli_close($conn);

// Create a line chart using the data
echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
echo '<script type="text/javascript">';
echo 'google.charts.load("current", {packages:["corechart"]});';
echo 'google.charts.setOnLoadCallback(drawChart);';
echo 'function drawChart() {';
echo 'var data = google.visualization.arrayToDataTable([';
echo '["Date", "Count"],';
foreach ($date_counts as $date => $count) {
    echo '["'.$date.'", '.$count.'],';
}
echo ']);';
echo 'var options = {';
echo 'title: "Daily Registrations",';
echo 'legend: { position: "none" },';
echo 'chartArea: { width: "50%", height: "70%" },';
echo 'hAxis: { title: "Date", titleTextStyle: { color: "black" } },';
echo 'vAxis: { title: "Count", titleTextStyle: { color: "black" } },';
echo 'series: { 0: { type: "line" } },';
echo '};';
echo 'var chart = new google.visualization.LineChart(document.getElementById("linechart"));';
echo 'chart.draw(data, options);';
echo '}';
echo '</script>';
echo '<h2>Daily Registrations</h2>';
echo '<div id="linechart" style="width: 110%; height: 300px;"></div>';
?>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-check"></i>
                    <span class="text">Approved</span>
					</div>
                    <?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'bdds';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// check connection
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}

// filter by blood type
if (isset($_GET['filter'])) {
  $blood_type = $_GET['blood_type'];
  $query = "SELECT * FROM approved_donors WHERE blood_type = '$blood_type'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
  ?>
    <html>
    <head>
      <title>Donors with Blood Type <?php echo $blood_type;?></title>
      <style>
        body {
          font-family: Arial, sans-serif;
          margin: 20px;
        }
        table {
          border-collapse: collapse;
          width: 100%;
        }
        th, td {
          border: 1px solid #ddd;
          padding: 10px;
          text-align: left;
        }
        th {
          background-color: #f0f0f0;
        }
        button {
          background-color: #4CAF50;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }
        button:hover {
          background-color: #3e8e41;
        }
      </style>
      <script>
        function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
        }
      </script>
    </head>
    <body>
      <h1>Donors with Blood Type <?php echo $blood_type;?></h1>
      <div id="printable">
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Blood Type</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>History</th>
            <th>Medical_conditions</th>
            <th>Any_procedure</th>
            <th>Medicine</th>
            <th>Remarks</th>
            <th>Date Added</th>
          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['donor_id'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['phone'];?></td>
              <td><?php echo $row['blood_type'];?></td>
              <td><?php echo $row['gender'];?></td>
              <td><?php echo $row['date_of_birth'];?></td>
              <td><?php echo $row['age'];?></td>
              <td><?php echo $row['history'];?></td>
              <td><?php echo $row['medical_conditions'];?></td>
              <td><?php echo $row['any_procedure'];?></td>
              <td><?php echo $row['medicine'];?></td>
              <td><?php echo $row['remarks'];?></td>
              <td><?php echo $row['date_of_registration'];?></td>
            </tr>
            <?php
          }
        ?>
        </table>
      </div>
      <button onclick="printDiv('printable')">Print</button>
    </body>
    </html>
    <?php
  } else {
    echo "No donors found with blood type ". $blood_type;
  }
} else {
?>
  <style>
  /* Add some styling to the form */
  form {
    margin: 0px;
    padding: 20px;
    
    width: 40%;
  border-radius: 20px;
  }

  /* Style the select element */
  select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 60%;
  }

  /* Style the filter button */
  button[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  /* Add a hover effect to the filter button */
  button[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>

<form>
  <select name="blood_type" id="blood_type">
    <option value="">Select Blood Type</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select>
  <br><br>
  <button type="submit" name="filter" value="Filter">Filter</button>
</form>
  <?php
}

// close connection
mysqli_close($conn);
?>
                </div>

                <div class="activity-data">
                <?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'bdds';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Retrieve approved donors from approved_donors table
$sql = "SELECT * FROM approved_donors";
$result = $conn->query($sql);

// Display approved donors in the table
if ($result->num_rows > 0) {
    ?>
    <style>
        #approved-donors-table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #approved-donors-table th, #approved-donors-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        #approved-donors-table th {
            background-color: #f0f0f0;
        }
        #approved-donors-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <h1>Approved Donors</h1>
    <table id='approved-donors-table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Blood Type</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>History</th>
                <th>Medical_conditions</th>
                <th>Any_procedure</th>
                <th>Medicine</th>
                <th>Remarks</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id='approved-donors-tbody'>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row["donor_id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["phone"] ?></td>
                <td><?= $row["blood_type"] ?></td>
                <td><?= $row["gender"] ?></td>
                <td><?= $row["date_of_birth"] ?></td>
                <td><?= $row["age"] ?></td>
                <td><?= $row["history"] ?></td>
                <td><?= $row["medical_conditions"] ?></td>
                <td><?= $row["any_procedure"] ?></td>
                <td><?= $row["medicine"] ?></td>
                <td><?= $row["remarks"] ?></td>
                <td><?= $row["date_of_registration"] ?></td>
                <td>
                <form action="delete_donor.php" method="post">
        <input type="hidden" name="donor_id" value="<?= $row["donor_id"]?>">
        <button type="submit" onclick="return confirm('Are you sure you want to delete this donor?')">Delete</button>
    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else {
    echo "<p>No approved donors found</p>";
}

// Close connection
$conn->close();
?>

	</div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
	
</body>
</html>