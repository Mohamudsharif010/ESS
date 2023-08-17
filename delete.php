<?php
// Retrieve the file ID from the URL parameter
if (isset($_GET["id"])) {
    $fileId = $_GET["id"];

    // Retrieve the file path from the database
    $dbHost = "localhost";
    $dbUser = "username";
    $dbPassword = "password";
    $dbName = "files";

    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve the file path
    $filePath = "";
    $sql = "SELECT path FROM files WHERE id = ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $fileId);
    $statement->execute();
    $statement->bind_result($filePath);
    $statement->fetch();
    $statement->close();

    // Delete the file from the server
    if (!empty($filePath)) {
        unlink($filePath);
    }

    // Delete the file record from the database
    $sql = "DELETE FROM files WHERE id = ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $fileId);
    $statement->execute();
    $statement->close();

    $connection->close();

    // Redirect back to the uploaded files page
    header("Location: upload_handler.php");
    exit();
} else {
    // Redirect back to the uploaded files page if no file ID is provided
    header("Location: procurement.php");
    exit();
}
