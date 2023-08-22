<?php
ob_start();
include 'header.php';

$uploadMessage = "";

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

            // Redirect to the same page to display uploaded files
            header("Location: procurement.php");
            exit();
        }
    }
    ob_end_flush();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload a File</title>
    <style>
        #documents-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 50px;
            margin-right: 400px;
        }

        .upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .upload-container h2 {
            margin-bottom: 20px;
        }

        .upload-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }

        .upload-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .upload-form input[type="file"] {
            margin-bottom: 20px;
        }

        .upload-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload a File</title>
    <style>
        /* Your CSS styles */

        /* ... */
    </style>
</head>

<body>
    <div id="documents-page">
        <div class="upload-container">
            <h2>Upload a File</h2>
            <form class="upload-form" method="post" enctype="multipart/form-data">
                <label for="file">Select a file:</label>
                <input type="file" name="file" id="file" accept=".txt,.pdf,.doc"><br><br>
                <input type="submit" name="submit" value="Upload">
            </form>
            <!-- Display error message -->
            <?php if (!empty($uploadMessage)) : ?>
                <p><?php echo htmlspecialchars($uploadMessage); ?></p>
            <?php endif; ?>
        </div>
    </div>
    
</body>


</html>
