<?php
session_start();
include 'phpalert.php';

$alert = new PHPAlert();
include("DbConnect.php"); // Database connection

// Check if the form is submitted
if (isset($_POST['reg_p'])) {
    // Ensure the client is logged in
    $username = $_SESSION['username'];

    // Capture form data
    $product = mysqli_real_escape_string($conn, $_POST['product']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category']);
    // $product_id = mysqli_real_escape_string($conn, $_POST['product']);

    //Fetch product id
    // $product_query = "SELECT id FROM products WHERE name = ?";
    // $stmt = $conn->prepare($product_query);
    // $stmt->bind_param('i', $product);
    // $stmt->execute();
    // $product_result = $stmt->get_result();
    // $product_row = $product_result->fetch_assoc();
    // $product_id = $product_row['id'];

    // Fetch category name
    $category_query = "SELECT name FROM category WHERE id = ?";
    $stmt = $conn->prepare($category_query);
    $stmt->bind_param('i', $category_id);
    $stmt->execute();
    $category_result = $stmt->get_result();
    $category_row = $category_result->fetch_assoc();
    $category_name = $category_row['name'];

    // Insert the order into the database
    $sql = "INSERT INTO category (name, product_id, price) 
                VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sis', $category_name, $product, $quantity);
    if ($stmt->execute()) {
        $alert->success('New order created successfully');

        // Prepare data for SMS}

    } else {
        $alert->success('error occured');
    }

    $stmt->close();
}

$conn->close();
