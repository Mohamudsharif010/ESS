<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>

    <title>Events Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .event {
            background-color: #ffc;
            font-size: 12px;
        }

        .nav-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 10px;
        }

        .create-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .create-btn:hover,
        .nav-btn:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .create-btn:active,
        .nav-btn:active {
            background-color: #003366;
        }

        /* Custom styles for the calendar */
        td {
            min-width: 60px;
            height: 60px;
            font-size: 18px;
        }

        td.today {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        td.event-day {
            background-color: #ffc;
            font-weight: bold;
        }

        .tags {
            background-color: #4caf50;
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            margin-top: 150px;
            height: 20px;
            width: 10%;
            background-color: grey;
        }

        .current-day {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .modal__overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            z-index: 9999;
            /* Ensure the modal appears on top of the calendar */
            display: none;
            /* Hide the modal by default */
        }


        .modal__container {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
        }

        .modal__title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .modal__content {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .modal__close {
            cursor: pointer;
            float: right;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div>
        <h1>Events Calendar</h1>
        <?php
        // Your database connection details
        $host = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "files";

        try {
            // Connect to the database using PDO
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Get the current month and year
            $currentMonth = date("m");
            $currentYear = date("Y");

            echo '<h2 style="color:grey">' . date("F, Y") . '</h2>'; // This will display something like "July 2023"

            // Get the first day of the current month
            $firstDay = date("N", strtotime("$currentYear-$currentMonth-01"));

            // Get the number of days in the current month
            $daysInMonth = date("t", strtotime("$currentYear-$currentMonth-01"));

            // Create the calendar table
            echo '<table>';
            echo '<tr>';
            echo '<th>Mon</th>';
            echo '<th>Tue</th>';
            echo '<th>Wed</th>';
            echo '<th>Thu</th>';
            echo '<th>Fri</th>';
            echo '<th>Sat</th>';
            echo '<th>Sun</th>';
            echo '</tr>';

            // Initialize variables to keep track of days in the loop
            $dayCount = 1;
            $eventIndex = 0;

            // Fetch events from the database and store them in $eventsByDate array
            $eventsByDate = array();
            $stmt = $conn->query("SELECT * FROM events");
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Store events in $eventsByDate array using event_date as the key
            foreach ($events as $event) {
                $eventDate = $event['event_date'];
                $eventsByDate[$eventDate][] = $event;
            }

            // Loop through days and create the calendar
            for ($i = 1; $i <= 6; $i++) {
                echo '<tr>';
                for ($j = 1; $j <= 7; $j++) {
                    if (($i == 1 && $j < $firstDay) || $dayCount > $daysInMonth) {
                        // Empty cells before the first day of the month and after the last day
                        echo '<td></td>';
                    } else {
                        // Display the day number and events
                        $currentDate = "$currentYear-$currentMonth-" . str_pad($dayCount, 2, '0', STR_PAD_LEFT);

                        // Check if there are events on this date and add the "has-event" class
                        if (isset($eventsByDate[$currentDate])) {
                            echo '<td class="event-day has-event"';
                            // Add data attributes for event details
                            echo ' data-title="' . htmlspecialchars($eventsByDate[$currentDate][0]['event_title']) . '"';
                            echo ' data-date="' . htmlspecialchars($eventsByDate[$currentDate][0]['event_date']) . '"';
                            echo ' data-description="' . htmlspecialchars($eventsByDate[$currentDate][0]['event_description']) . '"';
                            echo '>';
                        } else {
                            echo '<td>';
                        }

                        echo $dayCount;

                        if (isset($eventsByDate[$currentDate])) {
                            echo '<div class="event">';
                            foreach ($eventsByDate[$currentDate] as $event) {
                                echo '<p>' . htmlspecialchars($event['event_title']) . '</p>';
                            }
                            echo '</div>';
                        }

                        echo '</td>';
                        $dayCount++;
                    }
                }
                echo '</tr>';
            }


            echo '</table>';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
    </div>

    <!-- Add the "Create Event" button -->
    <button class="btn">
        <a href="create_event.php">Create Event</a>
    </button>

    <!-- "tags" div placed below the calendar -->
    <div class="tags">
        <a href="?year=<?php echo $prevYear ?>&month=<?php echo $prevMonth ?>">Previous Month</a>
        <a href="?year=<?php echo $nextYear ?>&month=<?php echo $nextMonth ?>">Next Month</a>
    </div>
    <!-- Modal for displaying event details -->
    <div class="modal-container" id="eventModal">
        <span class="modal__close" onclick="closeModal()">&times;</span>
        <h2 class="modal__title" id="eventModal-title"></h2>
        <div class="modal__content" id="eventModal-content"></div>
    </div>

    <script>
        // JavaScript code for handling click on event cells and showing the modal
        document.addEventListener('DOMContentLoaded', function() {
            const eventCells = document.querySelectorAll('.has-event');

            eventCells.forEach(function(cell) {
                cell.addEventListener('click', function() {
                    // Extract event details from data attributes
                    const title = cell.getAttribute('data-title');
                    const date = cell.getAttribute('data-date');
                    const description = cell.getAttribute('data-description');

                    // Update modal content with event details
                    document.getElementById('eventModal-title').textContent = title;
                    document.getElementById('eventModal-content').textContent = `Date: ${date}\nDescription: ${description}`;

                    // Show the modal
                    showModal();
                });
            });
        });

        // Functions to show/hide the modal
        function showModal() {
            document.getElementById('eventModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('eventModal').style.display = 'none';
        }
    </script>

</body>

</html>