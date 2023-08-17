<?php
ob_start(); // Start output buffering
include 'header.php';

// Retrieve the file ID from the URL parameter
if (isset($_GET["id"])) {
    $fileId = $_GET["id"];

    // Handle file update
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve file details from $_FILES superglobal
        $fileName = $_FILES["file"]["name"];
        $fileType = $_FILES["file"]["type"];
        $fileSize = $_FILES["file"]["size"];
        $tmpFilePath = $_FILES["file"]["tmp_name"];

        // Define the allowed file types
        $allowedTypes = array("text/plain", "application/pdf", "application/msword");

        // Check if the selected file type is allowed
        if (!in_array($fileType, $allowedTypes)) {
            $uploadMessage = "Error: File type not supported. Please select a .txt, .pdf, or .doc file.";
        } else {
            // Move the uploaded file to the desired location
            $uploadDirectory = "uploads/";
            $uploadPath = $uploadDirectory . $fileName;

            // Check if a file with the same name already exists
            if (file_exists($uploadPath)) {
                $uploadMessage = "File with the same name already exists. Please rename the file or upload a different one.";
            } else {
                // Update the file details in the database
                $dbHost = "localhost";
                $dbUser = "username";
                $dbPassword = "password";
                $dbName = "files";

                $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Retrieve the previous file path
                $previousFilePath = "";
                $sql = "SELECT path FROM files WHERE id = ?";
                $statement = $connection->prepare($sql);
                $statement->bind_param("i", $fileId);
                $statement->execute();
                $statement->bind_result($previousFilePath);
                $statement->fetch();
                $statement->close();

                // Update the file details in the database
                $sql = "UPDATE files SET name = ?, type = ?, size = ?, path = ? WHERE id = ?";
                $statement = $connection->prepare($sql);
                $statement->bind_param("ssisi", $fileName, $fileType, $fileSize, $uploadPath, $fileId);
                $statement->execute();
                $statement->close();
                $connection->close();

                // Move the uploaded file to the desired location
                move_uploaded_file($tmpFilePath, $uploadPath);

                // Delete the previous file
                if (!empty($previousFilePath)) {
                    unlink($previousFilePath);
                }

                // Set the success message
                $uploadMessage = "File updated successfully!";

                // Redirect to procurement.php
                header("Location: procurement.php");
                exit();
            }
        }
    }

    // Retrieve the current file details from the database
    $dbHost = "localhost";
    $dbUser = "username";
    $dbPassword = "password";
    $dbName = "files";

    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve file details from the database
    $sql = "SELECT * FROM files WHERE id = ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $fileId);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $statement->close();
    $connection->close();
} else {
    // Redirect back to the uploaded files page if no file ID is provided
    header("Location: uploaded_files.php");
    exit();
}

ob_end_flush(); // Flush the output buffer
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit File</title>
</head>

<body>
    <h1>Edit File</h1>

    <!-- Display success message -->
    <?php if (!empty($uploadMessage)) : ?>
        <p><?php echo htmlspecialchars($uploadMessage); ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>