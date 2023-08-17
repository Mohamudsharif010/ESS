<!DOCTYPE html>
<html>

<head>
    <title>Leave Request Submission</title>
    <style>
        /* Center the form for leave request submission */
        .leave {
            margin-right: 600px;

        }

        form {
            width: 70;
            /* You can adjust the width as needed */
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #f2f2f2;
        }

        table th {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>

    <!-- Add the form to submit leave requests -->
    <div class="leave">
        <h2 style="text-align: center;">Leave Request Form</h2>
        <form action=" submit_leave_request.php" method="post">

            <label for="leave_type">Leave Type:</label>
            <select name="leave_type" required>
                <option value="Sick Leave">Sick Leave</option>
                <option value="Annual Leave">Annual Leave</option>
                <option value="Personal Leave">Personal Leave</option>
                <!-- Add more options for other leave types as needed -->
            </select><br>

            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" required><br>

            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" required><br>

            <label for="reason">Reason:</label>
            <textarea name="reason" required></textarea><br>

            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>