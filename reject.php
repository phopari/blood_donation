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
$sql = "SELECT gender, COUNT(*) AS count FROM rejected_donors GROUP BY gender";
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
$sql = "SELECT blood_type, COUNT(*) AS count FROM rejected_donors GROUP BY blood_type";
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
$sql = "SELECT DATE(date_of_registration) AS date, COUNT(*) AS count FROM rejected_donors GROUP BY DATE(date_of_registration)";
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
                    <i class="uil uil-ban"></i>
                    <span class="text">Rejected</span>
					</div><?php
echo "<button type='button' class='btn btn-primary no-print' onclick='printTable()'>
    <i class='fas fa-print'></i> Print <i class='fas fa-file-pdf'></i>
</button>";

echo "</div>";

echo "<script>
    function printTable() {
        var table = document.getElementById('donor-table');
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Donor List</title></head><body>');
        printWindow.document.write(table.outerHTML);
        printWindow.document.write('</body></html>');
        printWindow.print();
    }
</script>";

echo "<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>";
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

// Query to retrieve data from rejected_donors table
$sql = "SELECT * FROM rejected_donors";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Display the data in a table
    echo "<table style='border-collapse: separate; border-spacing: 0; width: 100%; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>ID</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Name</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Email</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Phone</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Blood Type</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Gender</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Date of Birth</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Age</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>History</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Medical_conditions</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Any_procedure</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Medicine</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Remarks</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Date of Registration</th>";
    echo "<th style='padding: 10px; text-align: left; background-color: #f7f7f7; font-weight: bold; border-bottom: 2px solid #ccc;'>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: ". ($row["donor_id"] % 2 == 0? "#f2f2f2" : "#ffffff")."'>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["donor_id"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["name"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["email"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["phone"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["blood_type"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["gender"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["date_of_birth"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["age"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["history"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["medical_conditions"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["any_procedure"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["medicine"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["remarks"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>". $row["date_of_registration"]. "</td>";
        echo "<td style='padding: 10px; text-align: left;'>";
        echo "<a href='delete_reject.php?donor_id=". $row["donor_id"]. "' style='color: #ff0000; text-decoration: none;'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No rejected donors found.";
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