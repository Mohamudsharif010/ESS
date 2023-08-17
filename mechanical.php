<!DOCTYPE html>
<html>

<head>
  <title>Volks</title>
  <title>Admin Dashboard | By Code Info</title>

  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />



  <style>
    /*  import google fonts */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      border: none;
      outline: none;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #0c4e92;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 60px;
      padding: 20px;
      background: #fff;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo a {
      color: #000;
      font-size: 18px;
      font-weight: 600;
      margin: 2rem 8rem 2rem 2rem;
    }


    .search_box {
      display: flex;
      align-items: center;
      margin-top: 20px;
    }

    .search_box input {
      padding: 9px;
      width: 250px;
      background: rgb(228, 228, 228);
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
    }

    .search_box i {
      padding: 0.67rem;
      cursor: pointer;
      color: #fff;
      background: #000;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    .promo_card {
      width: 100%;
      color: #0c4e92;
      margin-top: 10px;
      border-radius: 8px;
      padding: 0.5rem 1rem 1rem 3rem;
      background: #939598;
    }

    .promo_card h1,
    .promo_card span,
    button {
      margin: 10px;
    }

    .promo_card button {
      display: block;
      padding: 6px 12px;
      border-radius: 5px;
      cursor: pointer;
    }

    .history_lists {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }


    .header-icons {
      display: flex;
      align-items: center;
    }

    .header-icons i {
      margin-right: 2rem;
      cursor: pointer;
    }

    .header-icons .account {
      width: 130px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header-icons .account img {
      width: 35px;
      height: 35px;
      cursor: pointer;
      border-radius: 50%;
    }

    .container {
      margin-top: 10px;
      display: flex;
      justify-content: space-between;
    }

    /* Sidebar Section */
    .sidebar {
      width: 15%;
      padding: 2rem 1rem;
      background: #fff;
    }

    .sidebar h4 {
      margin-bottom: 1.5rem;
    }

    .sidebar .balance {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
    }

    .balance .icon {
      color: #fff;
      font-size: 20px;
      border-radius: 6px;
      margin-right: 1rem;
      padding: 1rem;
      background: rgb(37, 37, 37);
    }

    .balance .info h5 {
      font-size: 16px;
    }

    .balance .info span {
      font-size: 14px;
      color: rgb(100, 100, 100);
    }

    .balance .info i {
      margin-right: 2px;
    }

    /* Side menubar section */
    /* Side menubar section */
    nav {
      background: #fff;
    }

    .side_navbar {
      padding: 1px;
      display: flex;
      flex-direction: column;
    }

    .side_navbar span {
      color: gray;
      margin: 1rem 3rem;
      font-size: 12px;
    }

    .side_navbar a {
      width: 100%;
      padding: 0.8rem 3rem;
      font-weight: 500;
      font-size: 15px;
      color: rgb(100, 100, 100);
    }

    .links {
      margin-top: 5rem;
      display: flex;
      flex-direction: column;
    }

    .links a {
      font-size: 13px;
    }

    .side_navbar a:hover {
      background: rgb(235, 235, 235);
    }

    .side_navbar .active {
      border-left: 2px solid rgb(100, 100, 100);
    }

    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      color: #333;
    }

    p {
      color: #666;
    }

    h2 {
      color: #333;
      margin-top: 20px;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    li {
      margin-bottom: 5px;
    }

    img {
      max-width: 300px;
      height: auto;
      margin-top: 20px;
    }

    .form-group {
      margin-bottom: 10px;
      width: 70%;
    }

    .form-label {
      font-weight: bold;
    }

    .form-input {
      width: 100%;
      padding: 5px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .form-submit {
      padding: 10px 20px;
      border-radius: 4px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .main-body {
      width: 70%;
      padding: 1rem;

    }

    .row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 1rem 0;
    }

    table {
      background: #fff;
      padding: 1rem;
      text-align: left;
      border-radius: 10px;
    }

    table td,
    th {
      padding: 0.2rem 0.8rem;
    }

    table th {
      font-size: 15px;
    }

    table td {
      font-size: 13px;
      color: rgb(100, 100, 100);
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    img {
      max-width: 100px;
      height: auto;
    }

    .action-buttons {
      display: flex;
      gap: 5px;
    }

    .edit-button,
    .delete-button {
      padding: 5px 10px;
      border-radius: 4px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .delete-button {
      background-color: #f44336;
    }

    textarea#description {
      width: 100%;
      padding: 5px;
      border-radius: 4px;
      border: 1px solid #ccc;
      resize: vertical;
      /* Allows vertical resizing */
      height: auto;
      /* Automatically adjusts height based on content */
      min-height: 150px;
    }

    .edit-profile {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
      margin-bottom: 15px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="logo">
      <!--<a href="#">EasyPay</a>-->
      <div class="search_box">
        <input type="text" placeholder="Search ---">
        <i class="fa-sharp fa-solid fa-magnifying-glass" style="margin-bottom: 20px; padding: 10px;"></i>
      </div>
    </div>

    <div class="header-icons">
      <i class="fas fa-bell"></i>
      <div class="account">
        <img src="images/Volks.png" alt="">
        <h4>Alice Jeremoki</h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav>
      <div class="side_navbar">
        <span>Main Menu</span>
        <a href="dashboard.php" class="active">Dashboard</a>

        <a href="tasks.php">Profile</a>
        <a href="upload.php">Upload</a>
        <a href="events.php">Events</a>
        <a href="leave.php">Leave</a>
        <a href="documents.php">Documents</a>

        <!--<div class="links">
        <span>Quick Link</span>
        <a href="#">Paypal</a>
        <a href="#">EasyPay</a>
        <a href="#">SadaPay</a>
      </div>
-->
      </div>
    </nav>
    <div class="main-body">
      <h2>Dashboard</h2>
      <div class="promo_card">
        <h1>Welcome to Mechanical Department </h1>
        <span>Service the mechanical components using job-specific equipment.</span>
        <a href="https://volkselevator.co.ke/" target="_blank"><button>Learn More</button></a>
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