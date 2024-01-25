<?php
// Include necessary files and initialize product data (replace with your database logic)
include('../db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $image_url = $_POST['image_url'];

    // Update product in the database
    $sql = "UPDATE products 
            SET product_name = '$product_name', product_price = '$product_price', image_url = '$image_url' 
            WHERE id = $product_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the products page after successful update
        header("Location: products.php");
        exit();
    } else {
        // Handle the error, you may customize this based on your needs
        echo "Error updating product: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
