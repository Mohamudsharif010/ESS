<body>
    <?php include 'header.php'; ?>
    <?php
    // Product details
    $productName = isset($_POST['product_name']) ? $_POST['product_name'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $suppliers = isset($_POST['suppliers']) ? $_POST['suppliers'] : "";
    $productImage = isset($_FILES['product_image']) ? $_FILES['product_image']['name'] : "";

    // Handle file upload
    if (isset($_FILES['product_image'])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['product_image']['name']);
        move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFile);
    }
    ?>
    <div class="main-body">

        <h1><?php echo $productName; ?></h1>
        <p><?php echo $description; ?></p>

        <form action="display_page.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" id="product_name" name="product_name" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-input" required></textarea>
            </div>

            <div class="form-group">
                <label for="suppliers" class="form-label">Suppliers:</label>
                <select id="suppliers" name="suppliers" class="form-input" required>
                    <option value="Supplier 1">China</option>
                    <option value="Supplier 2">India</option>
                    <option value="Supplier 3">Germany</option>
                </select>
            </div>

            <div class="form-group">
                <label for="product_image" class="form-label">Product Image:</label>
                <input type="file" id="product_image" name="product_image" class="form-input" required>
            </div>

            <input type="submit" value="Submit" class="form-submit"> <br>

        </form>
    </div>
</body>

</html>