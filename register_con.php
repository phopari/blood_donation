<?php
$server = 'localhost:3307';
$user = 'root';
$pass = '';
$db = 'red_cross';

// Connect to the database
$connection = mysqli_connect($server, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Connection successful
echo "Connected to database successfully";

// Now you can use the connection to perform queries
// For example, to insert data into the donor table:
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$blood_type = $_POST['blood_type'];
$gender = $_POST['gender'];

$query = "INSERT INTO donor (name, email, phone, blood_type, gender, date_of_registration) VALUES ('$name', '$email', '$phone', '$blood_type', '$gender', NOW())";

if ($conn->query($query) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>