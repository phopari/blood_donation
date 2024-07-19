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

// Get the donor ID from the URL
$donor_id = $_GET['donor_id'];

// Query to delete the donor
$sql = "DELETE FROM rejected_donors WHERE donor_id = '$donor_id'";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Donor deleted successfully!');</script>";
    echo "<script>window.location.href='reject.php';</script>";
} else {
    echo "Error deleting donor: " . $conn->error;
}

// Close connection
$conn->close();
?>