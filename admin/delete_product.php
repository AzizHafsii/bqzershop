<?php
// Include necessary files and initialize product data (replace with your database logic)
include('../db_connection.php');

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    // Retrieve the product ID from the URL
    $product_id = $_GET['id'];

    // Delete the product from the database
    $sql = "DELETE FROM products WHERE id = $product_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the products page after successful deletion
        header("Location: products.php");
        exit();
    } else {
        // Handle the error, you may customize this based on your needs
        echo "Error deleting product: " . $conn->error;
    }
} else {
    // Redirect to the products page if the product ID is not provided
    header("Location: products.php");
    exit();
}

// Close the database connection
$conn->close();
?>
