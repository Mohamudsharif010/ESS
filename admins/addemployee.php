<?php 
session_start();
include '../header.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection
    $empId = $_POST['empcode']; // Make sure this matches your form input name
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['email'];
    $email = $_POST['email'];
    // ... other form fields ...

    // Insert data into the database
    $query = "INSERT INTO tblemployees (EmpId, FirstName, LastName, EmailId, Password, Gender, Dob, Department, Address, City, Country, Phonenumber, Status, RegDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Bind the values
    $stmt->bindParam(1, $empId);
    $stmt->bindParam(2, $firstName);
    $stmt->bindParam(3, $lastName);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(4, $email);

    

    // Execute the query
    if ($stmt->execute()) {
        // Data inserted successfully
        $_SESSION['new_employee'] = $_POST; 
        // Redirect to the "Manage Employees" page
        header('Location: manageemployee.php');
        exit;
    } else {
        // Failed to insert data
        // Handle the error
        echo "Failed to insert data into the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .containers {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="containers">
        <h2>Add Employee</h2>
        <form id="example-form" method="POST" action="manageemployee.php">
            <div>
                <h3>Employee Info</h3>
                <div>
                <!-- First section of the form -->
                <div class="wizard-content">
                    <label for="empcode">Employee Code (Must be unique):</label>
                    <input name="empcode" id="empcode" type="text" required>
                    
                    <label for="firstName">First Name:</label>
                    <input id="firstName" name="firstName" type="text" required>
                    
                    <label for="lastName">Last Name:</label>
                    <input id="lastName" name="lastName" type="text" required>
                    
                    <label for="email">Email:</label>
                    <input name="email" type="email" id="email" required>
                </div>
            </div>
            <div>
                <!-- Second section of the form -->
                <div class="wizard-content">
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" required>
                    
                    <label for="confirm">Confirm Password:</label>
                    <input id="confirm" name="confirmpassword" type="password" required>
                </div>
            </div>
            
            <div>
                <!-- Third section of the form -->
                <div class="wizard-content">
                    <label for="gender">Gender:</label>
                    <select name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    
                    <!-- Add more fields here for the third section -->
                </div>
            </div>
            
            <div>
                <!-- Fourth section of the form -->
                <div class="wizard-content">
                    <label for="birthdate">Birthdate:</label>
                    <input id="birthdate" name="dob" type="date">
                    
                    <label for="department">Department:</label>
                    <select name="department">
                        <option value="Department1">Human Resource</option>
                        <option value="Department2">Information Technology</option>
                        <option value="Department2">Sales</option>
                        <!-- Add more departments here -->
                    </select>
                </div>
                <div class="wizard-content">
                    <label for="address">Address:</label>
                    <input id="address" name="address" type="text">
                    
                    <label for="city">City/Town:</label>
                    <input id="city" name="city" type="text">
                    
                    <label for="country">Country:</label>
                    <input id="country" name="country" type="text">
                    
                    <label for="phone">Mobile Number:</label>
                    <input id="phone" name="mobileno" type="tel" maxlength="10">
                    
                    <button type="submit" id="add">Add</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
