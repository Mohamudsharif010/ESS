<body>
  <?php include 'header.php'; ?>

  <div class="main-body">
    <h2>Dashboard</h2>
    <div class="promo_card">
      <h1>Welcome to Service and Maintenace</h1>
      <span>We do Maintenance</span>
      <a href="https://volkselevator.co.ke/"><button>Learn More</button></a>
    </div>

    <!--  <div class="history_lists">
        <div class="list1">
          <div class="row">
            <h4>History</h4>
            <a href="history.php">See all</a>
          </div>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Dates</th>
                <th>Name</th>
                <th>Type</th>
                <th>Ammount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>2, Aug, 2022</td>
                <td>Sam Tonny</td>
                <td>Premimum</td>
                <td>$2000.00</td>
              </tr>
              <tr>
                <td>2</td>
                <td>29, July, 2022</td>
                
                <td>Code Info</td>
                <td>Silver</td>
                <td>$5,000.00</td>
              </tr>
              <tr>
                <td>3</td>
                <td>15, July, 2022</td>
              
                <td>Jhon David</td>
                <td>Startup</td>
                <td>$3000.00</td>
              </tr>
              <tr>
                <td>4</td>
                <td>5, July, 2022</td>
                <td>Salina Gomiz</td>
                <td>Premimum</td>
                <td>$7000.00</td>
              </tr>
              <tr>
                <td>5</td>
                <td>29, June, 2022</td>
                <td>Gomiz</td>
                <td>Gold</td>
                <td>$4000.00</td>
              </tr>
              <tr>
                <td>6</td>
                <td>28, June, 2022</td>
                <td>Elyana Jhon</td>
                <td>Premimum</td>
                <td>$2000.00</td>
              </tr>
            </tbody>
          </table>
        </div>



        <div class="list2">
          <div class="row">
            <a href="upload.html">Upload</a>
          </div>
		  <h1>Procurement Data</h1> -->

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
    </table>
  </div>
  </div>
  </div>

  <div class="sidebar">
    <!-- <h4>Account Balance</h4>
      
      <div class="balance">
        <i class="fas fa-dollar icon"></i>
        <div class="info">
          <h5>Dollar</h5>
          <span><i class="fas fa-dollar"></i>25,000.00</span>
        </div>
      </div>

      
      <div class="balance">
        <i class="fa-solid fa-rupee-sign icon"></i>
        <div class="info">
          <h5>PKR</h5>
          <span><i class="fa-solid fa-rupee-sign"></i>300,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fas fa-euro icon"></i>
        <div class="info">
          <h5>Euro</h5>
          <span><i class="fas fa-euro"></i>25,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fa-solid fa-indian-rupee-sign icon"></i>
        <div class="info">
          <h5>INR</h5>
          <span><i class="fa-solid fa-indian-rupee-sign"></i>220,000.00</span>
        </div>
      </div>

      <div class="balance">
        <i class="fa-solid fa-sterling-sign icon"></i>
        <div class="info">
          <h5>Pound</h5>
          <span><i class="fa-solid fa-sterling-sign"></i>30,000.00</span>
        </div>
      </div>

    </div>
-->
  </div>
</body>

</html>