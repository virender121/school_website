<?php
// Retrieve form data
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$first_name = $_POST['first_name'] ?? "";
$email = $_POST['email'] ?? "";

// Connect to SQLite database
$db = new PDO('sqlite:C:/Sqlite3/registrationData.db');

// Prepare and execute the SQL statement to check if the email already exists
$checkStmt = $db->prepare("SELECT COUNT(*) FROM students WHERE email = :email");
$checkStmt->bindParam(':email', $email);
$checkStmt->execute();
$count = $checkStmt->fetchColumn();

if ($count > 0) {
    echo 'Email already exists.';
    // Handle the case where the email already exists, such as showing an error message or redirecting back to the form.
} else {
    // Proceed with the insertion code
    $stmt = $db->prepare("INSERT INTO students (first_name, email) VALUES (:first_name, :email)");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    echo 'Data stored successfully!';
    header("Location: /path/to/redirected_page.php");
    exit();
}

// Fetch the stored data from the database
$fetchStmt = $db->prepare("SELECT * FROM students WHERE email = :email");
$fetchStmt->bindParam(':email', $email);
$fetchStmt->execute();
$registrationData = $fetchStmt->fetch(PDO::FETCH_ASSOC);

// Display the retrieved data in the UI
if ($registrationData) {
    echo 'Name: ' . $registrationData['first_name'] . '<br>';
    echo 'Email: ' . $registrationData['email'] . '<br>';
    // Display other fields as needed
} else {
    echo 'No data found.';
}

// Close the database connection
$db = null;
?>