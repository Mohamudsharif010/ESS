<!DOCTYPE html>
<html>

<head>
    <title>Leave Requests</title>

</head>

<body>
    <?php include 'header.php' ?>
    <div>
    <!-- Display the list of leave requests -->
    <h2 style="text-align: center; margin-bottom: 20px;">Leave Requests</h2>
    <?php
    // Replace 'username', 'password', and 'files' with your actual database credentials
    $db_conn = mysqli_connect('localhost', 'username', 'password', 'files');

    if (!$db_conn) {
        die("Connection failed: " . mysqli_connect_error());
    }   

    
    // Retrieve leave requests from the database
    $query = "SELECT * FROM leave_requests";
    $result = mysqli_query($db_conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table style='border-collapse: collapse; width: 100%;'>
              <tr>
                  <th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Employee Name</th>
                  <th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Leave Type</th>
                  <th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Start Date</th>
                  <th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>End Date</th>
                  <th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Reason</th>
                  <th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Status</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='padding: 8px; text-align: left;'>" . $row['employee_name'] . "</td>";
            echo "<td style='padding: 8px; text-align: left;'>" . $row['leave_type'] . "</td>";
            echo "<td style='padding: 8px; text-align: left;'>" . $row['start_date'] . "</td>";
            echo "<td style='padding: 8px; text-align: left;'>" . $row['end_date'] . "</td>";
            echo "<td style='padding: 8px; text-align: left;'>" . $row['reason'] . "</td>";
            echo "<td style='padding: 8px; text-align: left;'>" . $row['status'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No leave requests found.</p>";
    }

    mysqli_close($db_conn);
    ?>
    </div>
    
</body>

</html>