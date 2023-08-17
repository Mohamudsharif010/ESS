<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload a File</title>
    <style>
        #documents-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 50px;
            margin-right: 400px;
        }

        .upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .upload-container h2 {
            margin-bottom: 20px;
        }

        .upload-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }

        .upload-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .upload-form input[type="file"] {
            margin-bottom: 20px;
        }

        .upload-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div id="documents-page">
        <div class="upload-container">
            <h2>Upload a File</h2>
            <form class="upload-form" action="upload_handler.php" method="post" enctype="multipart/form-data">
                <label for="file">Select a file:</label>
                <input type="file" name="file" id="file" accept=".txt,.pdf,.doc"><br><br>
                <input type="submit" name="submit" value="Upload">
            </form>
        </div>
    </div>
</body>

</html>