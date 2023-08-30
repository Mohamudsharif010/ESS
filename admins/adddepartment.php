<?php include 'admindash.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Department</title>
    <style>
        /* Add your custom styles here */
        .container {
            display: flex; /* Use flexbox */
            align-items: stretch; /* Stretch items vertically to match the height */
        }

        .mn-inner {
            flex: 1; /* Allow the content to grow to fill available space */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin-top: -600px;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-content {
            padding: 0;
        }

        .input-field {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <div class="mn-inner">
            <div class="page-title">Add Department</div>
            <div class="card">
                <div class="card-content">
                <form name="chngpwd" method="post">
                    <div class="input-field">
                        <label for="departmentname"></label>
                        <input id="departmentname" type="text" name="departmentname" placeholder="Department Name" required>
                    </div>
                    <div class="input-field">
                        <label for="departmentshortname"></label>
                        <input id="departmentshortname" type="text" name="departmentshortname" placeholder="Department Short Name" required>
                    </div>
                    <div class="input-field">
                        <label for="deptcode"></label>
                        <input id="deptcode" type="text" name="deptcode" placeholder="Department Code" required>
                    </div>
                    <div class="input-field">
                        <button type="submit" name="add">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
