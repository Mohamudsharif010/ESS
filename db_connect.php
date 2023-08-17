<?php

$dbHost = "localhost";
$dbUser = "username";
$dbPassword = "password";
$dbName = "files";

$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
