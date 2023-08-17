<?php
session_start();
include 'header.php';
include 'db_connect.php';

echo "<div class='main-body'>";
echo "<h1>Product Display Page</h1>";

echo "<table>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Image</th>";
echo "<th>Product Name</th>";
echo "<th>Stock</th>";
echo "<th>Description</th>";
echo "<th>Suppliers</th>";
echo "<th>Created By</th>";
echo "<th>Created At</th>";
echo "<th>Updated At</th>";
echo "<th>Action</th>";
echo "</tr>";

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

                // Display the inserted data in the table
                echo "<tr>
                        <td>{$productId}</td>
                        <td><img src=\"{$targetFile}\" alt=\"Product Image\"></td>
                        <td>{$productName}</td>
                        <td>{$supplierProduct['Stock']}</td>
                        <td>{$description}</td>
                        <td>{$suppliers}</td>
                        <td>Alice Jeremoki</td>
                        <td>" . date('Y-m-d H:i:s') . "</td>
                        <td>" . date('Y-m-d H:i:s') . "</td>
                        <td class=\"action-buttons\">
                            <button class=\"edit-button\">Edit</button>
                            <button class=\"delete-button\">Delete</button>
                        </td>
                    </tr>";
            } else {
                // Error occurred while inserting data
                echo "<tr><td colspan='10'>Error: " . mysqli_error($connection) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No product details available for the selected supplier.</td></tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Failed to upload image.</td></tr>";
    }
} else {
    echo "<tr><td colspan='10'>No data to display.</td></tr>";
}

echo "</table>";
echo "</div>";
?>

</body>

</html>