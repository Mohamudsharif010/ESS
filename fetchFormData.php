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

// Fetch form data from the database
$sql = "SELECT * FROM customer_service";
$result = $conn->query($sql);

$formData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $formData[] = array(
            'buildingName' => $row['building_name'],
            'phoneNumber' => $row['phone_number'],
            'email' => $row['email'],
            'reason' => $row['reason'],
            'solved' => $row['solved'],
            'notSolved' => $row['not_solved']
        );
    }
}

// Return form data as JSON
header('Content-Type: application/json');
echo json_encode($formData);

// Close the database connection
$conn->close();
