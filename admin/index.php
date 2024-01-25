<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Admin Dashboard - Home</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <section class="dashboard-content">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <!-- Add your welcome content here -->
    </section>

    <?php include('footer.php'); ?>
</body>
</html>
