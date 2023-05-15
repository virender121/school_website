<?php
// print_r($_POST)
$servername = "localhost:3306";
$username = "root";
$password = "Panku@123";
$dbname = "contact_data";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$department = $_POST['department'];
$message = $_POST['message'];

// Insert form data into the table
$sql = "INSERT INTO contact_data.contact (first_name, last_name, email, department, message) VALUES ('$first_name', '$last_name', '$email', '$department', '$message')";
if ($conn->query($sql) === TRUE) {
  echo "Data inserted successfully.";
} else {
  echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>
