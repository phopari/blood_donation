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

// Get the donor ID from the request
$donor_id = $_POST['donor_id'];

// Insert the donor into the approved_donors table
$sql = "INSERT INTO approved_donors (donor_id, name, email, phone, blood_type, gender, date_of_birth, age,history,medical_conditions,any_procedure,medicine,remarks, date_of_registration)
        SELECT donor_id, name, email, phone, blood_type, gender, date_of_birth, age,history,medical_conditions,any_procedure,medicine,remarks, date_of_registration
        FROM donors
        WHERE donor_id = '$donor_id'";
$conn->query($sql);

// Delete the donor from the donors table
$sql = "DELETE FROM donors WHERE donor_id = '$donor_id'";
$conn->query($sql);

// Close connection
$conn->close();
?>