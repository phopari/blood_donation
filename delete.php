<!-- delete.php -->
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
if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];

    $sql = "DELETE FROM donors WHERE donor_id='$donor_id'";

    if ($conn->query($sql) === TRUE) {
        ?>
        <script>
            alert("Record deleted successfully");
            window.location.href = "homepage.php"; // redirect to donors.php after deletion
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Error deleting record: <?php echo $conn->error;?>");
            window.location.href = "donors.php"; // redirect to donors.php after deletion
        </script>
        <?php
    }
}

// Close connection
$conn->close();
?>