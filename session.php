<?php
session_start();

include('db_connect.php'); // Include your database connection file

$empId_check = $_SESSION['empId']; // Use 'empId' instead of 'username'

$ses_sql = mysqli_query($connection, "SELECT EmpId FROM users WHERE EmpId = '$empId_check' ");

if (!$ses_sql) {
    die("Query failed: " . mysqli_error($connection));
}

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['EmpId'];

if (!isset($_SESSION['empId'])) { // Use 'empId' instead of 'username'
    header("location: login.php");
    die();
}
?>
