<?php
include('includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .containers {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: left;
            display: flex;
            flex-direction: column;
        }
        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input-field-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .input-field {
            display: block;
            margin-bottom: 10px;
            padding: 15px;
            width: 90%;
        }
        .input-field:focus {
            outline: none;
            border-color: #3498db;
        }
        .btn {
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="containers">
        <div class="card">
            <h1>CHANGE PASSWORD</h1>
            <form>
                <div class="input-field-group">
                    <input type="password" class="input-field" placeholder="Current Password" required>
                    <input type="password" class="input-field" placeholder="New Password" required>
                    <input type="password" class="input-field" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn">CHANGE</button>
            </form>
        </div>
    </div>
</body>
</html>
