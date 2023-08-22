<style>
  .promo-card-container {
    display: flex; /* Use flexbox to align items side by side */
}

.promo_card {
    flex: 1; /* Distribute available space equally */
    margin: 0 10px; /* Add some spacing between the cards */
    background-color: #f5f5f5; /* Example background color */
    padding: 20px; /* Example padding */
    border: 1px solid #ddd; /* Example border */
}

</style>
<body>
  <?php include 'header.php'; ?>
  <div class="main-body">
    <h2 style="text-align: center;">Reports</h2>
    <div class="promo-card-container">
    <div class="promo_card">
        <h1>Weekly Reports</h1>
        <span>Upload your Weekly reports here</span>
        <a href="upload.php"><button>Upload</button></a>
    </div>
    <div class="promo_card">
        <h1>Monthly Reports</h1>
        <span>Upload your Monthly reports here</span>
        <a href="upload.php"><button>Upload</button></a>
    </div>
</div>
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

      // Redirect back to the uploaded files page
      header("Location: procurement.php");
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

    // Retrieve file records from the database
    $sql = "SELECT * FROM files";
    $result = $connection->query($sql);
    ?>

    <br>

    <!-- Display Uploaded Files -->
    <?php if ($result->num_rows > 0) : ?>
      <table>
        <tr>
          <th>Name</th>
          <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td>
              <a href="<?php echo $row["path"]; ?>" target="_blank"><?php echo $row["name"]; ?></a>
            </td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a> |
              <a href="uploaded_files.php?delete=<?php echo $row["id"]; ?>">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else : ?>
      <p>No files uploaded yet.</p>
    <?php endif; ?>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>
</body>

</html>