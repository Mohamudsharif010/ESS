<?php
// Database configuration
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "files";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Save form data to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buildingName = $_POST['buildingName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $reason = $_POST['reason'];

    // Handle checkboxes
    $solved = isset($_POST['solved']) ? 1 : 0;
    $notSolved = isset($_POST['notSolved']) ? 1 : 0;

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO customer_service (building_name, phone_number, email, reason, solved, not_solved)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $buildingName, $phoneNumber, $email, $reason, $solved, $notSolved);

    if ($stmt->execute()) {
        http_response_code(200);
        echo "Form data saved successfully.";
    } else {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    http_response_code(400);
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
