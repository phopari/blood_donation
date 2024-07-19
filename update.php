<!-- update.php -->
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

    $sql = "SELECT * FROM donors WHERE donor_id='$donor_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      ?>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
            }
            .resume {
                width: 40%;
                margin: 40px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .section {
                margin-bottom: 20px;
            }
            .label {
                font-weight: bold;
                margin-right: 10px;
            }
            .input-field {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
            }
        </style>
        <div class="resume">
            <h2>Donor Information</h2>
            <form action="update.php" method="post">
                <input type="hidden" name="donor_id" value="<?php echo $row["donor_id"];?>">
                <div class="section">
                    <label class="label" for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row["name"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row["email"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $row["phone"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="blood_type">Blood Type:</label>
                    <input type="text" id="blood_type" name="blood_type" value="<?php echo $row["blood_type"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" value="<?php echo $row["gender"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row["date_of_birth"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="age">Age:</label>
                    <input type="number" id="age" name="age" value="<?php echo $row["age"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="history">History:</label>
                    <input type="text" id="history" name="history" value="<?php echo $row["history"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="medical_conditions">Medical Conditions:</label>
                    <input type="text" id="medical_conditions" name="medical_conditions" value="<?php echo $row["medical_conditions"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="any_procedure">Any Procedure:</label>
                    <input type="text" id="any_procedure" name="any_procedure" value="<?php echo $row["any_procedure"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="medicine">Medicine Taken:</label>
                    <input type="text" id="medicine" name="medicine" value="<?php echo $row["medicine"];?>" class="input-field">
                </div>
                <div class="section">
                    <label class="label" for="remarks">Remarks:</label>
                    <textarea id="remarks" name="remarks" class="input-field"><?php echo isset($row["remarks"]) ? $row["remarks"] : '';?></textarea>
                </div>
                <input type="submit" name="update_donor" value="Update Donor" class="btn" style="background-color: #4CAF50; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            </form>
        </div>
        <?php
    } else {
        echo "No data found";
    }
}

if (isset($_POST['update_donor'])) {
    $donor_id = $_POST['donor_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $blood_type = $_POST['blood_type'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $age = $_POST['age'];
    $history = $_POST['history'];
    $medical_conditions = $_POST['medical_conditions'];
    $any_procedure = $_POST['any_procedure'];
    $medicine = $_POST['medicine'];
    $remarks = $_POST['remarks'];

    $sql = "UPDATE donors SET name='$name', email='$email', phone='$phone', blood_type='$blood_type', gender='$gender', date_of_birth='$date_of_birth', age='$age', history='$history', medical_conditions='$medical_conditions', any_procedure='$any_procedure', medicine='$medicine', remarks='$remarks' WHERE donor_id='$donor_id'";

    if ($conn->query($sql) === TRUE) {
       ?>
        <script>
            alert("Record updated successfully");
			window.location.href = "homepage.php"; // redirect to homepage.php after updated
        </script>
        <?php
    } else {
       ?>
        <script>
            alert("Error updating record: <?php echo $conn->error;?>");
        </script>
        <?php
    }
}

// Close connection
$conn->close();
?>