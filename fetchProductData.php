<?php
// Start a session and include the database connection file
session_start();
include 'db_connect.php';

// Fetch product data from the database
$sql = "SELECT * FROM products";
$result = mysqli_query($connection, $sql);

$productData = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productData[] = array(
            'product_id' => $row['product_id'],
            'image' => $row['image'],
            'product_name' => $row['product_name'],
            'stock' => $row['stock'],
            'description' => $row['description'],
            'suppliers' => $row['suppliers'],
            'created_by' => $row['created_by'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        );
    }
}

// Return product data as JSON
header('Content-Type: application/json');
echo json_encode($productData);

// Close the database connection
mysqli_close($connection);
