<?php
// Start a session and include the database connection file
session_start();
include 'db_connect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productName = $_POST['product_name'];
    $description = $_POST['description'];
    $suppliers = $_POST['suppliers'];

    $productImage = $_FILES['product_image']['name'];
    $productImageTemp = $_FILES['product_image']['tmp_name'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($productImage);

    // Handle file upload
    if (move_uploaded_file($productImageTemp, $targetFile)) {
        // Associative array of product details based on supplier
        $productDetails = array(
            "Supplier 1" => array(
                "Product Name" => "Product 1",
                "Description" => "Product 1 Description",
                "Stock" => 10
            ),
            "Supplier 2" => array(
                "Product Name" => "Product 2",
                "Description" => "Product 2 Description",
                "Stock" => 20
            ),
            "Supplier 3" => array(
                "Product Name" => "Product 3",
                "Description" => "Product 3 Description",
                "Stock" => 30
            )
        );

        // Check if selected supplier exists in the product details array
        if (array_key_exists($suppliers, $productDetails)) {
            $supplierProduct = $productDetails[$suppliers];

            // Insert data into the products table
            $query = "INSERT INTO products (image, product_name, stock, description, suppliers, created_by, created_at, updated_at)
                      VALUES ('$productImage', '$productName', '{$supplierProduct["Stock"]}', '$description', '$suppliers', 'Alice Jeremoki', NOW(), NOW())";

            if (mysqli_query($connection, $query)) {
                // Data inserted successfully
                $productId = mysqli_insert_id($connection);
                $response = array(
                    'status' => 'success',
                    'message' => 'Product data saved successfully.',
                    'product_id' => $productId
                );
                echo json_encode($response);
            } else {
                // Error occurred while inserting data
                $response = array(
                    'status' => 'error',
                    'message' => 'Error: ' . mysqli_error($connection)
                );
                echo json_encode($response);
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'No product details available for the selected supplier.'
            );
            echo json_encode($response);
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Failed to upload image.'
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method.'
    );
    echo json_encode($response);
}

// Close the database connection
mysqli_close($connection);
