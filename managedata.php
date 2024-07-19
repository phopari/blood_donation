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
        echo "<a href='update.php?donor_id=". $row["donor_id"]. "' style='text-decoration: none; color: #337ab7;'>";
        echo "<button type='button' class='btn btn-primary' style='border: none; border-radius: 10px; padding: 10px 20px; font-size: 16px; font-weight: bold;'>Update</button>";
        echo "</a> | ";
        echo "<a href='delete.php?donor_id=". $row["donor_id"]. "' style='text-decoration: none; color: #337ab7;'>";
        echo "<button type='button' class='btn btn-danger' style='border: none; border-radius: 10px; padding: 10px 20px; font-size: 16px; font-weight: bold;'>Delete</button>";
        echo "</a>";
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

<!-- Add iOS-like style and back button -->
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        background-color: #f7f7f7;
    }
    #donor-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }
    #donor-table th, #donor-table td {
        padding: 14px;
        border-bottom: 1px solid #ddd;
    }
    #donor-table th {
        background-color: #f7f7f7;
        font-weight: bold;
    }
    .btn {
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
    }
    .btn-primary {
        background-color: #337ab7;
        color: #fff;
    }
    .btn-danger {
        background-color: #d9534f;
        color: #fff;
    }
    .back-button {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 1;
    }
    .back-button a {
        text-decoration: none;
        color: #337ab7;
    }
    .back-button a:hover {
        color: #23527c;
    }
</style>

<!-- Add back button -->
<div class="back-button">
    <a href="homepage.php">
        <button type="button" class="btn btn-primary" style="border: none; border-radius: 10px; padding: 10px 20px; font-size: 16px; font-weight: bold;">Back</button>
    </a>
</div>