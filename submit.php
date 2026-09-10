<?php
$servername = "localhost";
$username = "root"; // default for WampServer
$password = "";     // default is empty
$dbname = "kvl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$school = $_POST['school'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$stream = $_POST['stream'];
$address = $_POST['address'];
$email = $_POST['email'];

// Insert into database
$sql = "INSERT INTO students (school, fullname, phone, dob, gender, stream, address, email)
        VALUES ('$school', '$fullname', '$phone', '$dob', '$gender', '$stream', '$address', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "<h2>Thank you, $fullname!</h2><p>Your details have been submitted successfully.</p>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>