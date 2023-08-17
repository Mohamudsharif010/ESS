<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $employee_name = $_POST["employee_name"];
    $leave_type = $_POST["leave_type"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $reason = $_POST["reason"];

    // Perform data validation
    $current_date = date("Y-m-d"); // Get the current date
    if ($start_date < $current_date || $end_date < $current_date) {
        die("Error: Start date and end date cannot be in the past.");
    }

    // Calculate the leave duration in days
    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $leave_duration = ($end_timestamp - $start_timestamp) / (60 * 60 * 24); // Convert seconds to days

    // Add additional validation logic as needed, such as checking available leave balance, etc.

    // Save the leave request data into the database
    // Replace 'your_username', 'your_password', and 'files' with your actual database credentials
    $db_conn = mysqli_connect('localhost', 'username', 'password', 'files');
    // Check if the connection was successful
    if (!$db_conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the query to prevent SQL injection
    $query = "INSERT INTO leave_requests (employee_name, leave_type, start_date, end_date, reason, leave_duration, status)
              VALUES (?, ?, ?, ?, ?, ?, 'Pending')"; // Set the status to 'Pending' by default

    // Prepare the statement
    $stmt = mysqli_prepare($db_conn, $query);

    // Bind parameters to the query
    mysqli_stmt_bind_param($stmt, "sssssd", $employee_name, $leave_type, $start_date, $end_date, $reason, $leave_duration);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        // Close the statement and the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($db_conn);

        // Redirect the user to the leave_requests.php page
        header("Location: leave_requests.php");
        exit; // Ensure the script stops executing after the redirection
    } else {
        echo "Error: " . mysqli_error($db_conn);
    }
}
