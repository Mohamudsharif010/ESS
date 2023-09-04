<?php 
ob_start();
session_start();
include '../header.php';
// Database connection configuration    
$dbHost = "localhost";
$dbUser = "username";
$dbPassword = "password";
$dbName = "files";

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection
    $empId = $_POST['empcode'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Assuming your password input's name is "password"
    $gender = $_POST['gender']; // Assuming your gender select's name is "gender"
    $dob = $_POST['dob']; // Assuming your date of birth input's name is "dob"
    $department = $_POST['department']; // Assuming your department select's name is "department"
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phonenumber = $_POST['mobileno']; // Assuming your mobile number input's name is "mobileno"
    $status = 1; // Assuming you want to set the status to 1 when adding a new employee
    $regDate = date('Y-m-d H:i:s'); // Assuming you want to set the registration date to the current date and time


    // Insert data into the database
    $query = "INSERT INTO tblemployees (EmpId, FirstName, LastName, EmailId, Password, Gender, Dob, Department, Address, City, Country, Phonenumber, Status, RegDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Bind the values
    $stmt->bindParam(1, $empId);
    $stmt->bindParam(2, $firstName);
    $stmt->bindParam(3, $lastName);
    $stmt->bindParam(4, $email); // Binding email
    $stmt->bindParam(5, $password); // Binding password
    $stmt->bindParam(6, $gender); // Binding gender
    $stmt->bindParam(7, $dob); // Binding dob
    $stmt->bindParam(8, $department); // Binding department
    $stmt->bindParam(9, $address); // Binding address
    $stmt->bindParam(10, $city); // Binding city
    $stmt->bindParam(11, $country); // Binding country
    $stmt->bindParam(12, $phonenumber); // Binding phonenumber
    $stmt->bindParam(13, $status); // Binding status
    $stmt->bindParam(14, $regDate); // Binding regDate

    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

if ($password !== $confirmpassword) {
    // Passwords don't match, handle the error
    echo "Passwords do not match.";
    exit;
}

// Store data in session
$_SESSION['new_employee'] = $newEmployeeData;


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
ob_end_flush();

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
            /* border: 1px solid #ccc;
            border-radius: 5px; */
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
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
        .form-columns {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Align items at the top */
        }
        .form-column {
            flex: 1;
            padding: 0 10px;
        }
    </style>
</head>
<body>
    <div class="containers">
        <h2>Add Employee</h2>
        <form id="example-form" method="POST" action="addemployee.php">
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
                    
                    <label for="confirmpassword">Confirm Password:</label>
                    <input id="confirmpassword" name="confirmpassword" type="password" required>
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
                            <option value="HR">Human Resource</option>
                            <option value="IT">Information Technology</option>
                            <option value="Sales">Sales</option>
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
