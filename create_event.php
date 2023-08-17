<!DOCTYPE html>
<html>

<head>
    <title>Create Event</title>
    <style>
        /* Center the form for leave request submission */
        .events {
            margin-right: 600px;

        }

        form {
            width: 70;
            /* You can adjust the width as needed */
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="events">
        <h1>Create Event</h1>

        <form action="process_create_event.php" method="post">
            <label for="event_title">Event Title:</label>
            <input type="text" id="event_title" name="event_title" required><br>

            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" required><br>

            <label for="event_description">Event Description:</label><br>
            <textarea id="event_description" name="event_description" rows="4" cols="50"></textarea><br>

            <input type="submit" value="Create">
        </form>
    </div>

</body>


</html>