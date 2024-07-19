<style>
.container {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}
</style>

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
    echo "<table style='border-collapse: separate; border-spacing: 0 10px;'>";
    echo "<tr style='background-color: #f7f7f7;'>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>ID</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Name</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Email</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Phone</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Blood Type</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Gender</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Date of Birth</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Age</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Date Added</th>";
    echo "<th style='padding: 10px; font-weight: bold; border-bottom: 1px solid #ddd;'>Actions</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: #fff;'>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["donor_id"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["name"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["email"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["phone"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["blood_type"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["gender"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["date_of_birth"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["age"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>". $row["date_of_registration"]. "</td>";
        echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>";
        echo "<button style='background-color: #4CAF50; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;' onclick='approveDonor(".$row["donor_id"].")'>Approve</button>";
        echo "<button style='background-color: #FFC080; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;' onclick='rejectDonor(".$row["donor_id"].")'>Reject</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "No data found";
}

// Close connection
$conn->close();
?>

