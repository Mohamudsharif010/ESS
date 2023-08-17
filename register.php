<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Volks";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Insert the user into the database
$sql = "INSERT INTO users (username, email, password, confirm_password) VALUES ('$username', '$email', '$password', '$confirm_password')";

if (mysqli_query($conn, $sql)) {
	echo "User registered successfully!";
    header('Location: login.html');
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
