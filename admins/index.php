<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Employee Portal |  Admin</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-content {
            padding: 20px;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 20px;
            display: block;
            text-align: center;
        }
        .form-label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .form-input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-btn {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 20px;
            background-color: teal;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .form-btn:hover {
            background-color: #008080;
        }
    </style>
</head>
<body class="signin-page">
    <div class="mn-content valign-wrapper">
        <main class="mn-inner container">
            <h4 class="card-title">Volks Portal Admin Login</a></h4>
            <div class="valign">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Sign In</span>
                                <form name="signin" method="post" action="addemployee.php">
                                    <label class="form-label" for="username">Username</label>
                                    <input id="username" type="text" name="username" class="form-input" autocomplete="off" required>
                                    <label class="form-label" for="password">Password</label>
                                    <input id="password" type="password" class="form-input" name="password" autocomplete="off" required>
                                    <button type="submit" name="signin" class="form-btn">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/js/alpha.min.js"></script>
</body>
</html>
