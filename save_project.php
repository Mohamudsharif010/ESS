<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Set your database password here
$dbname = "files"; // Change to your actual database name

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'files');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data (assuming form fields are named correctly)
    $projectNames = $_POST["project_name"];
    $clientNames = $_POST["client_name"];
    $phoneNumbers = $_POST["phone_number"];
    $emailAddresses = $_POST["email_address"];
    $callbackDates = $_POST["callback_date"];
    $solvedArray = isset($_POST["solved"]) ? $_POST["solved"] : array();
    $actualProblems = $_POST["actual_problem"];

    // Save form data to the database
    foreach ($projectNames as $index => $projectName) {
        // Sanitize data to prevent SQL injection (you should do this properly based on your database)
        $projectName = mysqli_real_escape_string($conn, $projectName);
        $clientName = mysqli_real_escape_string($conn, $clientNames[$index]);
        $phoneNumber = mysqli_real_escape_string($conn, $phoneNumbers[$index]);
        $emailAddress = mysqli_real_escape_string($conn, $emailAddresses[$index]);
        $callbackDate = mysqli_real_escape_string($conn, $callbackDates[$index]);
        $solved = isset($solvedArray[$index]) ? 1 : 0;
        $actualProblem = mysqli_real_escape_string($conn, $actualProblems[$index]);

        // Prepare and execute the SQL statement to insert data into the 'projects' table
        $stmt = $conn->prepare("INSERT INTO projects (project_name, client_name, phone_number, email_address, callback_date, solved, actual_problem) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $projectName, $clientName, $phoneNumber, $emailAddress, $callbackDate, $solved, $actualProblem);
        $stmt->execute();
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}

// Redirect back to the customer.php page after saving the data
header("Location: customer.php");
exit();
