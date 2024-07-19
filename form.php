
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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $blood_type = $_POST["blood_type"];
    $gender = $_POST["gender"];
    $date_of_birth = $_POST["date_of_birth"];
    $age = $_POST["age"];
    $history = $_POST["history"];
    $medical_conditions = $_POST["medical_conditions"];
    $any_procedure = $_POST["any_procedure"];
    $medicine = $_POST["medicine"];

    // Insert data into donors table
    $sql = "INSERT INTO donors (name, email, phone, blood_type, gender, date_of_birth, age, history, medical_conditions, any_procedure, medicine) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date_of_birth_formatted = date('Y-m-d', strtotime($date_of_birth)); // format date string to YYYY-MM-DD
    $stmt->bind_param("ssssssissss", $name, $email, $phone, $blood_type, $gender, $date_of_birth_formatted, $age, $history, $medical_conditions, $any_procedure, $medicine);
    $stmt->execute();

    // Display success message
    echo "<script>alert('Donor registered successfully!');</script>";

    // Close connection
    $conn->close();
}

?>

<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        background-color: #f7f7f7;
        margin: 0; /* added to remove default margin */
    }

    form {
        max-width: 800px; /* increased width for landscape orientation */
        margin: 40px auto; /* adjusted margin to center the form */
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex; /* added flexbox to arrange fields in two columns */
        flex-wrap: wrap; /* wrap fields to next line when necessary */
    }

    h2 {
        font-weight: bold;
        margin-top: 0;
        width: 100%; /* make h2 full-width */
        margin-bottom: 20px; /* added margin to separate from form fields */
    }

    label {
        display: block;
        margin-bottom: 10px;
        width: 45%; /* make labels 45% wide */
        margin-right: 10px; /* add margin between labels and fields */
    }

    input[type="text"], input[type="email"], input[type="tel"], input[type="number"], select {
        width: 45%; /* make fields 45% wide */
        height: 40px;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="date"] {
        width: 45%; /* make date field 45% wide */
        height: 40px;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff; /* add white background to date field */
        padding-left: 20px; /* add padding to align with calendar icon */
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        opacity: 1; /* show calendar icon */
        cursor: pointer; /* change cursor to pointer on hover */
    }

    textarea {
        width: 90%; /* make textarea 90% wide */
        height: 100px;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical; /* allow textarea to be resized vertically */
    }

    input[type="submit"] {
        width: 100%; /* make submit button full-width */
        height: 40px;
        background-color: #AA0000;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px; /* added margin to separate from form fields */
    }

    input[type="submit"]:hover {
        background-color: #e90b0b;
    }

    /* added media query to adjust layout for smaller screens */
    @media (max-width: 600px) {
        form {
            flex-direction: column; /* stack fields vertically on smaller screens */
        }
        label {
            width: 100%; /* make labels full-width on smaller screens */
            margin-right: 0; /* remove margin between labels and fields on smaller screens */
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="number"], select {
            width: 100%; /* make fields full-width on smaller screens */
        }
        textarea {
            width: 100%; /* make textarea full-width on smaller screens */
        }
    }
</style>

<form method="post">
  <h2>Donor Registration Form</h2>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>
  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" required><br><br>
  <label for="blood_type">Blood Type:</label>
  <select id="blood_type" name="blood_type" required>
    <option value="">Select</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select><br><br>
  <label for="gender">Gender:</label>
  <select id="gender" name="gender" required>
    <option value="">Select</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select><br><br>
  <label for="date_of_birth">Date of Birth:</label>
  <input type="date" id="date_of_birth" name="date_of_birth" required><br><br>
  <label for="age">Age:</label>
  <input type="number" id="age" name="age" required><br><br>

  <label for="history">Is this your first time donating?</label>
  <select id="history" name="history" required>
    <option value="">Select</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
  </select>

  <label for="medical_conditions">Do you suffer from or have suffered from any diseases? If yes, please specify.</label>
  <textarea id="medical_conditions" name="medical_conditions" required></textarea><br><br>
  <label for="any_procedure">In the last 6 months, have you had any of the following?</label>
  <select id="any_procedure" name="any_procedure" required>
    <option value="">Select</option>
    <option value="Tattoo">Tattooing</option>
    <option value="Piercing">Ear Piercing</option>
    <option value="Dental">Dental Extraction</option>
    <option value="None">None</option>
  </select><br><br>
   <label for="medicine">Are you taking or have you taken any of these in the past 72 hours?</label>
  <select id="medicine" name="medicine" required>
    <option value="">Select</option>
    <option value="Antibiotics">Antibiotics</option>
    <option value="Aspirin">Aspirin</option>
    <option value="Alcohol">Alcohol</option>
    <option value="Steroids">Steroids</option>
    <option value="Vaccinations">Vaccinations</option>
    <option value="Rabies">Rabies Vaccine 1yr</option>
    <option value="None">None</option>
  </select><br><br>
  <input type="submit" value="Register">
</form>