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

<!-- Coding By CodingNepal - codingnepalweb.com -->
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
                <li><a href="#">
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
                <li><a href="logout.php">
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
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
				

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-clock"></i>
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

// Retrieve data from donors table
$sql = "SELECT donor_id FROM donors";
$result = $conn->query($sql);

// Count total number of IDs
$total_ids = 0;
while($row = $result->fetch_assoc()) {
    $total_ids++;
}

// Display count
echo "<p style='font-size: 30px;text-align: center;'>Pending</br> <span>$total_ids</span></p>";

// Close connection
$conn->close();
?>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-ban"></i>
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

// Query to count the number of rows in rejected_donors table
$sql = "SELECT COUNT(*) as total_rejected_donors FROM rejected_donors";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_rejected_donors = $row["total_rejected_donors"];
    
	echo "<p style='font-size: 30px;text-align: center;'>Rejected</br> <span>$total_rejected_donors</span></p>";
} else {
    echo "No rejected donors found.";
}

// Close connection
$conn->close();
?>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-check"></i>
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

// Query to count the number of rows in approved_donors table
$sql = "SELECT COUNT(*) as total_approved_donors FROM approved_donors";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_approved_donors = $row["total_approved_donors"];
	echo "<p style='font-size: 30px;text-align: center;'>Approved</br> <span>$total_approved_donors</span></p>";
} else {
    echo "No approved donors found.";
}

// Close connection
$conn->close();
?>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Pendings</span>
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

// Retrieve data from donors table
$sql = "SELECT * FROM donors";
$result = $conn->query($sql);

// Display data in a table
if ($result->num_rows > 0) {
    echo "<div class='container'>";
    echo "<table id='donor-table' style='border-collapse: separate; border-spacing: 0 10px;'>";
    echo "<tr style='background-color: #f7f7f7;'>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>ID</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Name</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Email</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Phone</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Blood Type</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Gender</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Date of Birth</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Age</th>";
	echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>History</th>";
	echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Condition</th>";
	echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Any_Procedure</th>";
	echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Medicine Taken</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Remarks </th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Date Added</th>";
    echo "<th style='padding: 14px; font-weight: bold; border-bottom: 1px solid #ddd;'>Actions</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: #fff;'>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["donor_id"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["name"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["email"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["phone"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["blood_type"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["gender"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["date_of_birth"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["age"]. "</td>";
		echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["history"]. "</td>";
		echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["medical_conditions"]. "</td>";
		echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["any_procedure"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["medicine"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["remarks"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>". $row["date_of_registration"]. "</td>";
        echo "<td style='padding: 14px; border-bottom: 1px solid #ddd;'>";
        echo "<a href='managedata.php' onclick='updateDonor(".$row["donor_id"]."); return false;'><button type='button' class='btn btn-primary'>Update</button></a>";
        echo "<button type='button' class='btn btn-danger' onclick='rejectDonor(".$row["donor_id"]."); alert(\"Donor with ID " . $row["donor_id"] . " has been rejected!\"); window.location.href=\"homepage.php\";'>Reject</button>";
echo "<button type='button' class='btn btn-success' onclick='approveDonor(".$row["donor_id"]."); alert(\"Donor with ID " . $row["donor_id"] . " has been approved!\"); window.location.href=\"homepage.php\";'>Approve</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
   
} else {
    echo "No data found";
}

// Close connection
$conn->close();
?>

<script>
  function rejectDonor(donor_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "reject_donor.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("donor_id=" + donor_id);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var row = document.getElementById("row-" + donor_id);
        row.parentNode.removeChild(row);
      }
    }
  }

  function approveDonor(donor_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "approve_donor.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("donor_id=" + donor_id);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var row = document.getElementById("row-" + donor_id);
        row.parentNode.removeChild(row);
      }
    }
  }
</script>

	</div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
	
</body>
</html>