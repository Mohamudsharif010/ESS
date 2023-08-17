<?php
$host = "localhost";
$username = "username";
$password = "password";
$dbname = "files";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve event data from the form submission
    $eventTitle = $_POST['event_title'];
    $eventDate = $_POST['event_date'];
    $eventDescription = $_POST['event_description'];

    // Check if the event date is in the future or the present
    $today = date("Y-m-d");
    if ($eventDate < $today) {
        // Redirect back to the events calendar with an error message
        header('Location: events.php?error=invalid_date');
        exit();
    }

    try {
        // Connect to the database using PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert the event data into the database
        $stmt = $conn->prepare("INSERT INTO events (event_title, event_date, event_description) VALUES (:title, :date, :description)");
        $stmt->bindParam(':title', $eventTitle);
        $stmt->bindParam(':date', $eventDate);
        $stmt->bindParam(':description', $eventDescription);
        $stmt->execute();

        // Redirect back to the events calendar after creating the event
        header('Location: events.php');
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
