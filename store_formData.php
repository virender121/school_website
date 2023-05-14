<?php
// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$department = $_POST['department'];
$message = $_POST['message'];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Invalid email format");
}

// Connect to database
$servername = "localhost";
$username = "root";
$password = "Panku@123";
$dbname = "contact_data";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statement to insert form data
$stmt = mysqli_prepare($conn, "INSERT INTO form_data (first_name, last_name, email, department, message) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $department, $message);

// Execute SQL statement to insert form data
if (mysqli_stmt_execute($stmt)) {
  echo "Form data stored successfully.";
} else {
  echo "Error: " . mysqli_error($conn);
}

// Prepare SQL statement to retrieve form data
$sql = "SELECT * FROM form_data";
$result = mysqli_query($conn, $sql);

// Display form data in HTML table
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Department</th><th>Message</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["department"] . "</td><td>" . $row["message"] . "</td></tr>";
  }
  echo "</table>";
}

// Close database connection
mysqli_free_result($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
