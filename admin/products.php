<?php
// Include necessary files and initialize product data (replace with your database logic)
include('../db_connection.php');

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check for query execution error
if (!$result) {
    die("Error retrieving products: " . $conn->error);
}

// Fetch product data into an array
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Admin Dashboard - Products</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <section class="dashboard-content">
        <h2>Product Management</h2>

        <!-- Display products -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td>$<?php echo number_format($product['product_price'], 2); ?></td>
                        <td><a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a> | <a href="delete_product.php?id=<?php echo $product['id']; ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Add new product form -->
        <form action="add_product.php" method="post">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required><br>

            <label for="product_price">Product Price:</label>
            <input type="text" name="product_price" required><br>

            <label for="image_url">Image URL:</label>
            <input type="text" name="image_url" required><br>

            <!-- Add other product details as needed -->

            <button type="submit">Add Product</button>
        </form>
    </section>

    <?php include('footer.php'); ?>
</body>
</html>
