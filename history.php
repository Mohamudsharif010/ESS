<!DOCTYPE html>
<html>
<head>
    <title>Procurement Data</title>
</head>
<body>
    <h1>Procurement Data</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>file_name</th>
            <th>file_size</th>
            <th>file_type</th>
            <th>upload_data</th>
        </tr>
        <?php
            // Set database connection details
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "volks";

            // Connect to the database
            $conn = mysqli_connect($host, $username, $password, $database);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Select all procurement data from the database
            $sql = "SELECT * FROM uploads";
            $result = mysqli_query($conn, $sql);

            // Loop through each row of procurement data and output it in the HTML table
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["file_name"] . "</td>";
                echo "<td>" . $row["file_type"] . "</td>";
                echo "<td>" . $row["file_size"] . "</td>";
                echo "<td>" . $row["upload_date"] . "</td>";
                echo "</tr>";
            }

            // Close database connection
            mysqli_close($conn);
        ?>
    </table>

</body>
</html>
