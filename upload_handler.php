<?php
include 'header.php';
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
            $uploadMessage = "Error: File with the same name already exists. Please rename the file or upload a different one.";
        } else {
            move_uploaded_file($tmpFilePath, $uploadPath);

            // Insert file details into the database
            $dbHost = "localhost";
            $dbUser = "username";
            $dbPassword = "password";
            $dbName = "files";

            $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Prepare and execute SQL INSERT statement
            $sql = "INSERT INTO files (name, type, size, path) VALUES (?, ?, ?, ?)";
            $statement = $connection->prepare($sql);
            $statement->bind_param("ssis", $fileName, $fileType, $fileSize, $uploadPath);
            $statement->execute();
            $statement->close();
            $connection->close();

            // Redirect to procurement.php
            header("Location: procurement.php");
            exit();
        }
    }
}

// Display uploaded files
$dbHost = "localhost";
$dbUser = "username";
$dbPassword = "password";
$dbName = "files";

$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve file records from the database
$sql = "SELECT * FROM files";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>File Uploads</title>
</head>

<body>
    <h1>File Uploads</h1>

    <!-- Display error message -->
    <?php if (!empty($uploadMessage)) : ?>
        <p><?php echo htmlspecialchars($uploadMessage); ?></p>
    <?php endif; ?>

    <!-- File Upload Form -->
    <form method="POST" enctype="multipart/form-data">
        <label for="file">Select a file:</label>
        <input type="file" name="file" id="file" accept=".txt,.pdf,.doc"><br><br>
        <button type="submit">Upload</button>
    </form>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>