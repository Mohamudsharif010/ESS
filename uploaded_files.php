<?php
ob_start(); 
    include 'header.php'; ?>
    <?php
    // Retrieve file records from the database
    $dbHost = "localhost";
    $dbUser = "username";
    $dbPassword = "password";
    $dbName = "files";

    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Delete file
    if (isset($_GET["delete"])) {
        $fileId = $_GET["delete"];

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

        // Redirect back to the referring page
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        exit();
    }

    $uploadMessage = ""; // Variable to store the success message

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve file details from $_FILES superglobal
        $fileName = $_FILES["file"]["name"];
        $fileType = $_FILES["file"]["type"];
        $fileSize = $_FILES["file"]["size"];
        $tmpFilePath = $_FILES["file"]["tmp_name"];

        // Allow only specific file extensions
        $allowedExtensions = array("pdf", "txt", "doc", "xls", "xlsx");
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            $uploadMessage = "Invalid file format. Only PDF, TXT, DOC, XLS, and XLSX files are allowed.";
        } else {
            // Move the uploaded file to the desired location
            $uploadDirectory = "uploads/";
            $uploadPath = $uploadDirectory . $fileName;

            // Check if a file with the same name already exists
            if (file_exists($uploadPath)) {
                $uploadMessage = "File with the same name already exists. Please rename the file or upload a different one.";
            } else {
                move_uploaded_file($tmpFilePath, $uploadPath);

                // Insert file details into the database
                $sql = "INSERT INTO files (name, type, size, path) VALUES (?, ?, ?, ?)";
                $statement = $connection->prepare($sql);
                $statement->bind_param("ssis", $fileName, $fileType, $fileSize, $uploadPath);
                $statement->execute();
                $statement->close();

                // Set the success message
                $uploadMessage = "File uploaded successfully!";
            }
        }
    }
?>
<?php
ob_end_flush();
?>
