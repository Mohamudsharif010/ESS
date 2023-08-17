<!DOCTYPE html>
<html>

<head>

    <title>Customer Service Project Tracking</title>
    <style>
        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4287f5;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Table Borders */
        th,
        td {
            border: 1px solid #ccc;
        }

        /* Add some padding to the form and buttons */
        form,
        button {
            margin-top: 10px;
        }

        /* Edit and Delete Button Styling */
        .action-buttons button {
            margin-right: 5px;
        }
    </style>
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

        .project {
            margin-left: 100px;
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
                <a href="#" class="active">Dashboard</a>

                <a href="tasks.php">Profile</a>
                <a href="upload.php">Upload</a>
                <a href="#">Product
                    <a href="display_page.php">View Product</a>
                    <a href="product.php">Add Product</a>
                </a>
                <a href="leave.php">Leave</a>
                <a href="documents.php">Documents</a>
            </div>
        </nav>
        </head>


        <body>
            <form class="project" action="save_project.php" method="POST">
                <table id="projectTable">
                    <thead>
                        <tr>
                            <th style="color:blue;">Project Name/ID</th>
                            <th style="color:blue;">Customer Name</th>
                            <th style="color:blue;">Phone Number</th>
                            <th style="color:blue;">Email Address</th>
                            <th style="color:blue;">Callback Date</th>
                            <th style="color:blue;">Solved</th>
                            <th style="color:blue;">Not Solved</th>
                            <th style="color:blue;">Actual Problem</th>
                            <th style="color:blue;">Actions</th> <!-- New column for edit and delete buttons -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Database configuration
                        $servername = "localhost";
                        $username = "root";
                        $password = " "; // Set your database password here
                        $dbname = "files"; // Change to your actual database name

                        // Create database connection
                        $conn = new mysqli('localhost', 'root', '', 'files');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Retrieve projects from the 'projects' table
                        $sql = "SELECT * FROM projects";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // Handle SQL query error
                            die("Error executing SQL query: " . $conn->error);
                        }

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td contenteditable='true'><input type='text' name='project_name[]' value='" . $row["project_name"] . "' /></td>";
                                echo "<td contenteditable='true'><input type='text' name='client_name[]' value='" . $row["client_name"] . "' /></td>";
                                echo "<td contenteditable='true'><input type='text' name='phone_number[]' value='" . $row["phone_number"] . "' /></td>";
                                echo "<td contenteditable='true'><input type='text' name='email_address[]' value='" . $row["email_address"] . "' /></td>";
                                echo "<td contenteditable='true'><input type='date' name='callback_date[]' value='" . $row["callback_date"] . "' /></td>";
                                echo "<td><input type='checkbox' name='solved[]' value='Yes' " . ($row["solved"] ? "checked" : "") . " /></td>";
                                echo "<td><input type='checkbox' name='solved[]' value='No' " . (!$row["solved"] ? "checked" : "") . " /></td>";
                                echo "<td contenteditable='true'><input type='text' name='actual_problem[]' value='" . $row["actual_problem"] . "' /></td>";
                                echo "<td class='action-buttons'><button type='button' onclick='editRow(this)'>Edit</button> <button type='button' onclick='deleteRow(this)'>Delete</button></td>";
                                echo "</tr>";
                            }
                        }

                        // Close the connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>

                <button type="button" onclick="addProject()">Add</button>
                <input type="submit" value="Save Projects" />
            </form>
            <script>
                // JavaScript code
                function addProject() {
                    const tableBody = document.querySelector('#projectTable tbody');

                    const newRow = tableBody.insertRow();
                    newRow.innerHTML = `
        <td contenteditable="true"><input type="text" name="project_name[]" /></td>
        <td contenteditable="true"><input type="text" name="client_name[]" /></td>
        <td contenteditable="true"><input type="text" name="phone_number[]" /></td>
        <td contenteditable="true"><input type="text" name="email_address[]" /></td>
        <td contenteditable="true"><input type="date" name="callback_date[]" /></td>
        <td><input type="checkbox" name="solved[]" value="Yes" /></td>
        <td><input type="checkbox" name="solved[]" value="No" /></td>
        <td contenteditable="true"><input type="text" name="actual_problem[]" /></td>
        <td class="action-buttons"><button type="button" onclick="editRow(this)">Edit</button> <button type="button" onclick="deleteRow(this)">Delete</button></td>
      `;

                    const checkboxes = newRow.querySelectorAll('input[name="solved[]"]');
                    checkboxes.forEach((checkbox) => {
                        checkbox.addEventListener('change', function() {
                            const row = this.parentNode.parentNode;
                            const solvedCell = row.cells[5];
                            const notSolvedCell = row.cells[6];

                            if (this.value === 'Yes') {
                                notSolvedCell.querySelector('input[name="solved[]"]').checked = false;
                                solvedCell.textContent = this.checked ? 'Yes' : '';
                            } else {
                                solvedCell.querySelector('input[name="solved[]"]').checked = false;
                                notSolvedCell.textContent = this.checked ? 'No' : '';
                            }
                        });
                    });
                }

                function deleteRow(button) {
                    const row = button.parentNode.parentNode;
                    row.remove();
                }

                function editRow(button) {
                    const row = button.parentNode.parentNode;
                    const cells = row.cells;

                    // Disable the edit button while editing
                    const editButton = cells[cells.length - 1].querySelector('button[onclick="editRow(this)"]');
                    editButton.disabled = true;

                    // Enable the Save button to apply changes
                    const saveButton = document.createElement('button');
                    saveButton.textContent = 'Save';
                    saveButton.onclick = function() {
                        saveChanges(row);
                        editButton.disabled = false;
                        row.removeChild(saveButton);
                    };

                    cells[cells.length - 1].appendChild(saveButton);

                    // Make the cells editable
                    for (let i = 0; i < cells.length - 1; i++) {
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.value = cells[i].textContent.trim();
                        cells[i].textContent = '';
                        cells[i].appendChild(input);
                    }
                }

                function saveChanges(row) {
                    const cells = row.cells;

                    // Extract and update the input values
                    for (let i = 0; i < cells.length - 1; i++) {
                        const input = cells[i].querySelector('input');
                        cells[i].textContent = input.value;
                    }
                }
            </script>
        </body>

</html>