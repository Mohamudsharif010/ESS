<?php include 'header.php' ?>

<head>
    <title>Task Management System</title>
    <style>
        .column {
            width: 300px;
            height: 500px;
            border: 1px solid black;
            display: inline-block;
            vertical-align: top;
            margin: 10px;
            padding: 10px;
        }

        .task {
            border: 1px solid gray;
            padding: 5px;
            margin: 5px;
            cursor: pointer;
        }

        #taskDescription {
            width: 280px;
        }
    </style>
</head>

<body>
    <div id="newColumn" class="column">
        <h2>New</h2>
        <form id="newTaskForm">
            <label for="taskTitle">Task Title:</label>
            <input type="text" id="taskTitle" name="taskTitle"><br><br>

            <label for="taskDescription">Task Description:</label><br>
            <textarea id="taskDescription" name="taskDescription" rows="4" cols="50"></textarea><br><br>

            <button type="button" onclick="createTask()">Create Task</button>
        </form>
    </div>
    <div id="ongoingColumn" class="column" ondragover="allowDrop(event)" ondrop="drop(event)">
        <h2>Ongoing</h2>
    </div>
    <div id="doneColumn" class="column" ondragover="allowDrop(event)" ondrop="drop(event)">
        <h2>Done</h2>
    </div>

    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function createTask() {
            var taskTitle = document.getElementById("taskTitle").value;
            var taskDescription = document.getElementById("taskDescription").value;

            var newTask = document.createElement("div");
            newTask.className = "task";
            newTask.innerHTML = `<strong>${taskTitle}</strong><br>${taskDescription}`;

            var ongoingColumn = document.getElementById("ongoingColumn");
            ongoingColumn.appendChild(newTask);

            newTask.setAttribute("draggable", "true");
            newTask.addEventListener("dragstart", (event) => {
                event.dataTransfer.setData("text/plain", newTask.id);
            });

            tasks.push(newTask);
            saveTasksToLocalStorage();

            document.getElementById("taskTitle").value = "";
            document.getElementById("taskDescription").value = "";
        }

        function drop(event) {
            event.preventDefault();
            const taskId = event.dataTransfer.getData("text/plain");
            const task = document.getElementById(taskId);
            const targetColumn = event.target.closest(".column");

            if (task && targetColumn) {
                targetColumn.appendChild(task);
                saveTasksToLocalStorage();
            }
        }

        const tasks = [];

        function saveTasksToLocalStorage() {
            const tasksData = [];
            tasks.forEach(task => {
                tasksData.push({
                    id: task.id,
                    column: task.parentElement.id
                });
            });
            localStorage.setItem("tasks", JSON.stringify(tasksData));
        }

        function loadTasksFromLocalStorage() {
            const tasksData = JSON.parse(localStorage.getItem("tasks")) || [];
            tasksData.forEach(taskData => {
                const task = document.getElementById(taskData.id);
                const column = document.getElementById(taskData.column);
                if (task && column) {
                    column.appendChild(task);
                    tasks.push(task);
                }
            });
        }

        // Load tasks from local storage when the page loads
        window.addEventListener("load", loadTasksFromLocalStorage);
    </script>
</body>

</html>.