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

// Get the donor ID from the form submission
$donor_id = $_POST["donor_id"];

// Delete the donor from the approved_donors table
$sql = "DELETE FROM approved_donors WHERE donor_id = '$donor_id'";
if ($conn->query($sql) === TRUE) {
    echo "Donor deleted successfully";
} else {
    echo "Error deleting donor: " . $conn->error;
}

// Close connection
$conn->close();
// Redirect back to the manage data page
header("Location: approved_donor.php");
exit;
?>