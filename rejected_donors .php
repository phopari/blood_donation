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

// Retrieve rejected donors from rejected_donors table
$sql = "SELECT * FROM rejected_donors";
$result = $conn->query($sql);

// Display rejected donors in the table
if ($result->num_rows > 0) {
    echo "<table id='rejected-donors-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "<th>Blood Type</th>";
    echo "<th>Gender</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Date Added</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody id='rejected-donors-tbody'>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["donor_id"]. "</td>";
        echo "<td>". $row["name"]. "</td>";
        echo "<td>". $row["email"]. "</td>";
        echo "<td>". $row["phone"]. "</td>";
        echo "<td>". $row["blood_type"]. "</td>";
        echo "<td>". $row["gender"]. "</td>";
        echo "<td>". $row["date_of_birth"]. "</td>";
        echo "<td>". $row["age"]. "</td>";
        echo "<td>". $row["date_of_registration"]. "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No rejected donors found";
}

// Close connection
$conn->close();
?>