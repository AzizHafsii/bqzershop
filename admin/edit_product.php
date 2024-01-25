<?php
// Include necessary files and initialize product data (replace with your database logic)
include('../db_connection.php');

// Check if the product ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: products.php");
    exit();
}

// Get the product ID from the URL
$product_id = $_GET['id'];

// Fetch product data based on the provided ID
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

// Check for query execution error
if (!$result) {
    die("Error retrieving product: " . $conn->error);
}

// Fetch product data into an array
$product = $result->fetch_assoc();

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Edit Product - Admin Dashboard</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <section class="dashboard-content">
        <h2>Edit Product</h2>

        <!-- Edit product form -->
        <form action="update_product.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required><br>

            <label for="product_price">Product Price:</label>
            <input type="text" name="product_price" value="<?php echo $product['product_price']; ?>" required><br>

            <label for="image_url">Image URL:</label>
            <input type="text" name="image_url" value="<?php echo $product['image_url']; ?>" required><br>

            <!-- Add other product details as needed -->

            <button type="submit">Update Product</button>
        </form>
    </section>

    <?php include('footer.php'); ?>
</body>
</html>
