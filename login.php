
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-image: url('./images/volks-ea.jpg');
			background-size: cover;
			background-position: center;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			margin: 0;
		}

		.header {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}

		.header img {
			width: 40px;
			height: 40px;
			margin-right: 10px;
		}

		.header h1 {
			font-size: 24px;
		}

		.login-container {
			background-color: rgba(255, 255, 255, 0.8);
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			width: 300px;
		}

		.login-container h2 {
			margin-bottom: 20px;
			text-align: center;
		}

		.form-group {
			margin-bottom: 15px;
			margin-right: 15px;
		}

		.form-group label {
			display: block;
			margin-bottom: 5px;
		}

		.form-group input {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
		}

		.btn {
			display: block;
			width: 100%;
			padding: 10px;
			background-color: #007bff;
			color: white;
			border: none;
			border-radius: 4px;
			font-size: 16px;
			cursor: pointer;
		}

		.btn:hover {
			background-color: #0056b3;
		}
	</style>
</head>

<body>
	<div class="header">
		<img src="./images/Volks.png" alt="Volks Elevator Logo">
		<h1>Volks Elevator</h1>
	</div>
	<div class="login-container">
		<h2>Login</h2>
		<form method="POST" action="procurement.php">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
			</div>
			<button type="submit" class="btn">Login</button>
		</form>
	</div>
	<script>

	</script>
</body>

</html>