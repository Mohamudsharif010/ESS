<?php 
session_start();
include '../header.php'?>
<?php 
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


// Check if the session data exists
if (isset($_SESSION['new_employee'])) {
    $newEmployeeData = $_SESSION['new_employee'];
    // Now you can use $newEmployeeData array to display the new employee's data
    // ... Your code to display the data ...
    
    // Don't forget to unset the session data to avoid displaying it again on page refresh
    unset($_SESSION['new_employee']);
}

$query = "SELECT id, EmpId, FirstName, LastName, Department, Status, Dob FROM tblemployees";
$stmt = $conn->prepare($query);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Employees</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Reset some default styles */
        body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
        }
        /* Main container */
        .mn-inner {
            padding: 20px;
            margin-right: 200px;
        }
        .page-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 20px;
            width: 700px; /* You can adjust this width value */
            max-width: 800px; /* Optional: Set a maximum width if needed */
        }
        .card-content {
            padding: 20px;
        }
        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
        /* Table styles */
        #example {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .show-entries select {
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <div class="mn-inner">
        <div class="page-title">Manage Employees</div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Employees Info</span>
                <div class="table-controls">
                    <div class="show-entries">
                        Show 
                        <select>
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="search-records">
                         <input type="text" placeholder="Search records">
                    </div>
                </div>
                <table id="example">
                    <thead>
                    <tr>
                            <th>Sr no </th>
                            <th>Emp Id </th>
                            <th>Full Name </th>
                            <th>Department </th>
                            <th>Status </th>
                            <th>Reg Date </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($newEmployeeData)): ?>
                    <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td><?php echo $employee['id']; ?></td>
                                <td><?php echo $employee['EmpId']; ?></td>
                                <td><?php echo $employee['FirstName'] . ' ' . $employee['LastName']; ?></td>
                                <td><?php echo $employee['Department']; ?></td>
                                <td><?php echo $employee['Status'] ? 'Active' : 'Inactive'; ?></td>
                                <td><?php echo $employee['Dob']; ?></td>
                                <td>
                                    <a href="editemployee.php?empid=<?php echo $employee['id']; ?>">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <a href="manageemployee.php?inid=<?php echo $employee['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?');">
                                        <i class="material-icons" title="Delete">clear</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif?>
                        <?php if (isset($_SESSION['new_employee'])): ?>
                            <?php $newEmployee = $_SESSION['new_employee']; ?>
                            <tr>
                                <td><?php echo $newEmployee['id']; ?></td>
                                <td><?php echo $newEmployee['EmpId']; ?></td>
                                <td><?php echo $newEmployee['FirstName'] . ' ' . $newEmployee['LastName']; ?></td>
                                <td><?php echo $newEmployee['Department']; ?></td>
                                <td><?php echo $newEmployee['Status'] ? 'Active' : 'Inactive'; ?></td>
                                <td><?php echo $newEmployee['Dob']; ?></td>
                                <td>
                                    <!-- ... Your action icons ... -->
                                </td>
                            </tr>
                            <?php unset($_SESSION['new_employee']); ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JavaScript libraries and scripts -->
</body>
</html>
