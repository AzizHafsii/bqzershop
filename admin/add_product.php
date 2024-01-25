<?php
// Include necessary files and initialize product data (replace with your database logic)
include('../db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $image_url = $_POST['image_url'];

    // Insert the product into the database
    $sql = "INSERT INTO products (product_name, product_price, image_url) VALUES ('$product_name', '$product_price', '$image_url')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the products page after successful insertion
        header("Location: products.php");
        exit();
    } else {
        // Handle the error, you may customize this based on your needs
        echo "Error adding product: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
