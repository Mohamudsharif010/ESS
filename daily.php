<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $department = $_POST["department"];
    $day = $_POST["day"];
    $date = $_POST["date"];
    $tasks = $_POST["tasks"];

    // Process and store the data as needed
    // For example, you can store it in a database or a file

    // After storing the data, you can show a success message
    $successMessage = "Form data has been successfully submitted.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Tracking Form</title>
    <!-- Your CSS styles here -->
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-body">
        <h2>Task Tracking Form</h2>
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
            <p style="color: green;">Form data has been successfully submitted:</p>
            <!-- <p><strong>Name:</strong> <?php echo $_POST["name"]; ?></p>
            <p><strong>Department:</strong> <?php echo $_POST["department"]; ?></p>
            <p><strong>Day:</strong> <?php echo $_POST["day"]; ?></p>
            <p><strong>Date:</strong> <?php echo $_POST["date"]; ?></p>
            <p><strong>Tasks Accomplished:</strong></p>
            <p><?php echo nl2br($_POST["tasks"]); ?></p> -->
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <input class="form-input" type="text" id="name" name="name" placeholder="Your answer">
            </div>
            <div class="form-group">
                <label class="form-label" for="department">Department:</label>
                <input class="form-input" type="text" id="department" name="department" placeholder="Your answer">
            </div>
            <div class="form-group">
                <label class="form-label" for="day">Day:</label>
                <select class="form-input" id="day" name="day">
                    <!-- Options for days here -->
                    <option value="">Select Day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="date">Date:</label>
                <input class="form-input" type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label class="form-label" for="tasks">Tasks Accomplished:</label>
                <textarea class="form-textarea" id="tasks" name="tasks" placeholder="Your answer"></textarea>
            </div>
            <button class="form-submit" type="submit" name="submit">Submit</button>
        </form>
    </div>

</body>
</html>
